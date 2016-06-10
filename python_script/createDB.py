# coding=utf-8
__author__ = 'Arthur'
import mysql.connector
import sys
from  xml.dom import  minidom

def get_attrvalue(node, attrname):
     return node.getAttribute(attrname) if node else ''

def get_nodevalue(node, index = 0):
    return node.childNodes[index].nodeValue if node else ''

def get_xmlnode(node,name):
    return node.getElementsByTagName(name) if node else []

if __name__=="__main__":
    print("connect mysql begin")
    dbname="null"
    xmlname="null"
    config={'host':'127.0.0.1',#default 127.0.0.1
        'user':'root',
        'password':'buaascse',
        'port':3306 ,#default port 3306
        #'database':'mobilephone', no default database
        'charset':'utf8'#default utf8
        }
    try:
        cnn = mysql.connector.connect(**config)
    except mysql.connector.Error as e:
         print('connect fails!{}'.format(e))

    if(len(sys.argv)<2):
        print("error arg")
        exit(1)
    else:
        dbname=sys.argv[1]
        xmlname=sys.argv[2]
    if(xmlname=="null"):
        exit(1)
    #get xml nodes
    print("connect mysql over")
    print("parse xml begin")
    doc = minidom.parse(xmlname)
    root = doc.documentElement #testresults
    project = get_xmlnode(root,'project')#project
    pnode=project[0]
    snapshots = get_xmlnode(pnode,'snapshots')#snapshots
    pnode=snapshots[0]
    snapshot= get_xmlnode(pnode,'snapshot')#snapshot
    root = snapshot[0]
    manufacturers=get_xmlnode(root,'manufacturers')#manufacturers node
    productgroups=get_xmlnode(root,'productgroups')#productgroups node
    products=get_xmlnode(root,'products')#products node
    propertygroups=get_xmlnode(root,'propertygroups')#propertygroups node
    propertys=get_xmlnode(root,'propertys')#propertys node
    calculationtypes=get_xmlnode(root,'calculationtypes')#calculationtypes node
    evaluations=get_xmlnode(root,'evaluations')#evaluations node
    results=get_xmlnode(root,'results')#results node
    print("parse xml over")
    print("begin create project")
    #check for the admin database
    checksql="select schema_name from INFORMATION_SCHEMA.schemata where schema_name='admin'"
    try:
        cursor = cnn.cursor()
        cursor.execute(checksql)
    except mysql.connector.Error as e:
        print('check for admin database fails!{}'.format(e))
    values=cursor.fetchall();
    if not values: #if there is not an admin database
        createadminsql="CREATE DATABASE  IF NOT EXISTS `admin`"
        useadminsql="USE `admin`"
        createdbtablesql="CREATE TABLE `databases` (" \
                         "`databasesname` varchar(50) NOT NULL," \
                         "PRIMARY KEY  (`databasesname`)" \
                         ") ENGINE=MyISAM DEFAULT CHARSET=utf8"
        createusertablesql="CREATE TABLE `users` (" \
                           "`username` varchar(45) NOT NULL," \
                           "`userpasswd` varchar(45) NOT NULL," \
                           "`useremail` varchar(45) default NULL," \
                           "PRIMARY KEY  (`username`)" \
                           ") ENGINE=MyISAM DEFAULT CHARSET=utf8"
        createdictionarysql="CREATE TABLE `dictionary` (" \
                            "`wordid` int(11) NOT NULL," \
                            "`originword` varchar(200) default NULL," \
                            "`De` varchar(200) default NULL," \
                            "`Eng` varchar(200) default NULL," \
                            "`CHN` varchar(400) default NULL" \
                            ") ENGINE=MyISAM DEFAULT CHARSET=utf8;"
        createTransusersql="CREATE TABLE `translationuser` (" \
                           "`username` varchar(45) NOT NULL," \
                           "`userpwd` varchar(45) NOT NULL," \
                           "`usertype` int(11) NOT NULL," \
                           "PRIMARY KEY (`username`,`usertype`,`userpwd`)" \
                           ") ENGINE=InnoDB DEFAULT CHARSET=utf8;"
        try:
            cursor = cnn.cursor()
            cursor.execute(createadminsql)
            cursor.execute(useadminsql)
            cursor.execute(createdbtablesql)
            cursor.execute(createusertablesql)
            cursor.execute(createTransusersql)
        except mysql.connector.Error as e:
            print('create for admin database fails!{}'.format(e))

    #create this db
    print("dbname:"+dbname)
    createdbsql="create database `"+dbname+"`"
    #print("createsql:"+createdbsql)
    adddbintoadminsql="INSERT INTO `admin`.`databases` (`databasesname`) VALUES ('"+dbname+"')"
    try:
        cursor = cnn.cursor()
        cursor.execute(createdbsql)
        cursor.execute(adddbintoadminsql)
    except mysql.connector.Error as e:
        print('create database fails!{}'.format(e))
    #select the database
    print("create database over")
    selectdbsql="use `"+dbname+"`"
    try:
        cursor = cnn.cursor()
        cursor.execute(selectdbsql)
    except mysql.connector.Error as e:
        print('select database fails!{}'.format(e))
    #-----------------------------------------create DB END
    #
    #create dictionary
    sql_create_table="CREATE TABLE `sdictionary` (" \
                     "`wordid` int(11) NOT NULL," \
                     "`oriword` varchar(200) default NULL," \
                     "`De` varchar(200) default NULL," \
                     "`Eng` varchar(200) default NULL," \
                     "`CHN` varchar(400) default NULL," \
                     "PRIMARY KEY  (`wordid`)" \
                     ") ENGINE=MyISAM DEFAULT CHARSET=utf8"
    try:
        cursor = cnn.cursor()
        cursor.execute(sql_create_table)
    except mysql.connector.Error as e:
        print('create table sdictionary fails!{}'.format(e))
    #create comments
    sql_create_table="CREATE TABLE `comments` (" \
                     "`id_comment` int(11) NOT NULL AUTO_INCREMENT," \
                     "`id_product` int(11) DEFAULT NULL," \
                     "`user` varchar(20) NOT NULL," \
                     "`content` varchar(400) NOT NULL," \
                     "`create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP," \
                     "PRIMARY KEY (`id_comment`)" \
                     ") ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8"
    try:
        cursor = cnn.cursor()
        cursor.execute(sql_create_table)
    except mysql.connector.Error as e:
        print('create table comments fails!{}'.format(e))


    #deal with manufacturers-----------------------BEGIN
    #create table
    sql_create_table="CREATE TABLE `manufacturers` (" \
                     "`comment` varchar(45) default NULL," \
                     "`name` varchar(45) default NULL," \
                     "`timestamp_lastchange` int(11) default NULL," \
                     "`timestamp_lastcreated` int(11) default NULL," \
                     "`id_manufacturer` varchar(20) NOT NULL," \
                     "PRIMARY KEY  (`id_manufacturer`)" \
                     ") ENGINE=MyISAM DEFAULT CHARSET=utf8"
    try:
        cursor = cnn.cursor()
        cursor.execute(sql_create_table)
    except mysql.connector.Error as e:
        print('create table manufacturers fails!{}'.format(e))
    manufactures_node=manufacturers[0]
    manufacture_list=[]
    manufacture_nodes=get_xmlnode(manufactures_node,'manufacturer')#manufacture nodes
    for node in manufacture_nodes:
        manufacture_id = get_attrvalue(node,'id_manufacturer')
        manufacture_name= get_attrvalue(node,'name')
        manufacture_comment=get_attrvalue(node,'comment')
        manufacturer_timestamp_created=get_attrvalue(node,'timestamp_created')
        manufacturer_timestamp_lastchange=get_attrvalue(node,'timestamp_lastchange')
        manufacture={} #save  one manufacture information
        manufacture['id'] ,manufacture['name'] ,manufacture['comment'] , manufacture['timestamp_created'] , manufacture['timestamp_lastchange'] = (
             manufacture_id, manufacture_name , manufacture_comment , int(manufacturer_timestamp_created) ,int(manufacturer_timestamp_lastchange)
        )
        sql_insert2="insert into manufacturers (id_manufacturer,name,comment,timestamp_lastchange,timestamp_lastcreated) values (%s, %s,%s,%s,%s)"
        data=(manufacture_id,manufacture_name,manufacture_comment,manufacturer_timestamp_lastchange,manufacturer_timestamp_created)
        cursor=cnn.cursor()
        cursor.execute(sql_insert2,data)
    #     manufacture_list.append(manufacture)# save  all manufacture information
    print("deal with manufacturers over")
    #manufacturers---------------------------------------------END

    # #deal with productgroups-------------------------------------BEGIN
    #create table
    sql_create_table="CREATE TABLE `productgroups` (" \
                     "`id_productgroup` varchar(20) NOT NULL," \
                     "`comment` varchar(45) default NULL," \
                     "`name` varchar(45) default NULL," \
                     "`timestamp_lastchange` int(12) default NULL," \
                     "`timestamp_created` int(12) default NULL," \
                     "PRIMARY KEY  (`id_productgroup`)" \
                     ") ENGINE=MyISAM DEFAULT CHARSET=utf8"
    try:
        cursor = cnn.cursor()
        cursor.execute(sql_create_table)
    except mysql.connector.Error as e:
        print('create table productgroups fails!{}'.format(e))
    productgroups_node=productgroups[0]
    productgroup_list=[]
    productgroup_nodes=get_xmlnode(productgroups_node,'productgroup')#productgroup nodes
    for node in productgroup_nodes:
        productgroup_id = get_attrvalue(node,'id_productgroup')
        productgroup_name= get_attrvalue(node,'name')
        productgroup_comment=get_attrvalue(node,'comment')
        productgroup_timestamp_created=get_attrvalue(node,'timestamp_created')
        productgroup_timestamp_lastchange=get_attrvalue(node,'timestamp_lastchange')
        productgroup={} #save  one productgroup information
        productgroup['id'] ,productgroup['name'] ,productgroup['comment'] , productgroup['timestamp_created'] , productgroup['timestamp_lastchange'] = (
             productgroup_id, productgroup_name , productgroup_comment , int(productgroup_timestamp_created) ,int(productgroup_timestamp_lastchange)
        )
        sql_insert2="insert into productgroups (id_productgroup,comment,name,timestamp_lastchange,timestamp_created) values (%s, %s,%s,%s,%s)"
        data=(productgroup_id,productgroup_comment,productgroup_name,productgroup_timestamp_lastchange,productgroup_timestamp_created)
        cursor=cnn.cursor()
        cursor.execute(sql_insert2,data)
    #productgroup_list.append(productgroup)# save  all producgroup information
    print("deal with productgroup over")
    #productgroups---------------------------------------------------END

    #deal with products---------------------------------------------BEGIN
    #create table
    sql_create_table="CREATE TABLE `products` (" \
                     "`id_product` varchar(20) NOT NULL," \
                     "`id_productgroup` varchar(20) NOT NULL," \
                     "`id_manufacturer` varchar(20) NOT NULL," \
                     "`icrt_code` varchar(45) default NULL," \
                     "`timestamp_lastchange` int(12) default NULL," \
                     "`timestamp_created` int(12) default NULL," \
                     "`picture_hires` varchar(45) default NULL," \
                     "`picture_lores` varchar(45) default NULL," \
                     "`similarmodelscodes` varchar(45) default NULL," \
                     "`parentmodelcode` varchar(45) default NULL," \
                     "`labcode` varchar(20) default NULL," \
                     "`batch` varchar(20) default NULL," \
                     "`sortorder` varchar(20) default NULL," \
                     "`articlenumber` varchar(30) default NULL," \
                     "`serialnumber` varchar(30) default NULL," \
                     "`boughtbyorganisation` varchar(20) default NULL," \
                     "`labarrivaldate` varchar(45) default NULL," \
                     "`labreportdate` varchar(45) default NULL," \
                     "`releasedate` varchar(45) default NULL," \
                     "`systemmodelid` varchar(45) default NULL," \
                     "`shortname` varchar(45) default NULL," \
                     "`completename` varchar(45) default NULL," \
                     "`modelname` varchar(45) default NULL," \
                     "PRIMARY KEY  (`id_product`)," \
                     "KEY `fk_products_productgroups1_idx` (`id_productgroup`)," \
                     "KEY `fk_products_manufacturers1_idx` (`id_manufacturer`)" \
                     ") ENGINE=MyISAM DEFAULT CHARSET=utf8"
    try:
        cursor = cnn.cursor()
        cursor.execute(sql_create_table)
    except mysql.connector.Error as e:
        print('create table products fails!{}'.format(e))
    products_node=products[0]
    product_list=[]
    product_nodes=get_xmlnode(products_node,'product')#product nodes
    for node in product_nodes:
        product={} #save  one product information
        product_id = get_attrvalue(node,'id_product')
        product['id']=product_id

        product_icrt= get_attrvalue(node,'icrt_code')
        product['i_crt']=product_icrt

        product_modelname=get_attrvalue(node,'modelname')
        product['modelname']=product_modelname

        product_completename=get_attrvalue(node,'completename')
        product['completename']=product_completename

        product_shortname=get_attrvalue(node,'shortname')
        product['shortname']=product_shortname

        product_systemmodelid=get_attrvalue(node,'systemmodelid')
        product['systemmodelid']=product_systemmodelid

        product_releasedate=get_attrvalue(node,'releasedate')
        product['releasedate']=product_releasedate

        product_labreportdate=get_attrvalue(node,'labreportdate')
        product['labreportdate']=product_labreportdate

        product_labarrivaldate=get_attrvalue(node,'labarrivaldate')
        product['labarrivaldate']=product_labarrivaldate

        product_boughtbyorganisation=get_attrvalue(node,'boughtbyorganisation')
        product['boughtbyorganisation']=product_boughtbyorganisation

        product_serialnumber=get_attrvalue(node,'serialnumber')
        product['serialnamber']=(product_serialnumber)

        product_articlenumber=get_attrvalue(node,'articlenumber')
        product['articlenumber']=(product_articlenumber)

        product_comment=get_attrvalue(node,'comment')
        product['comment']=product_comment

        product_id_productgroup=get_attrvalue(node,'id_productgroup')
        product['id_productgroup']=product_id_productgroup

        product_id_manufacturer=get_attrvalue(node,'id_manufacturer')
        product['id_manufacturer']=product_id_manufacturer

        product_sortorder=get_attrvalue(node,'sortorder')
        product['sortorder']=product_sortorder

        product_batch=get_attrvalue(node,'batch')
        product['batch']=product_batch

        product_labcode=get_attrvalue(node,'labcode')
        product['labcode']=product_labcode

        product_parentmodelcode=get_attrvalue(node,'parentmodelcode')
        product['parentmodelcode']=product_parentmodelcode

        product_similarmodelscodes=get_attrvalue(node,'similarmodelscodes')
        product['similarmodelscodes']=product_similarmodelscodes

        product_picture_lores=get_attrvalue(node,'picture_lores')
        product['picture_lores']=product_picture_lores

        product_picture_hires=get_attrvalue(node,'picture_hires')
        product['picture_hires']=product_picture_hires

        product_timestamp_created=get_attrvalue(node,'timestamp_created')
        product['TC']=int(product_timestamp_created)

        product_timestamp_lastchange=get_attrvalue(node,'timestamp_lastchange')
        product['TL']=int(product_timestamp_lastchange)
        sql_insert2="insert into products" \
                    " (id_product,id_productgroup,id_manufacturer,icrt_code," \
                    "timestamp_lastchange,timestamp_created," \
                    "picture_hires,picture_lores,similarmodelscodes,parentmodelcode," \
                    "labcode,batch,sortorder,articlenumber,serialnumber,boughtbyorganisation," \
                    "labarrivaldate,labreportdate,releasedate,systemmodelid,shortname," \
                    "completename,modelname)" \
                    " values (%s, %s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s," \
                    "%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)"
        data=(product_id,product_id_productgroup,product_id_manufacturer,product_icrt,\
              product_timestamp_lastchange,product_timestamp_created,\
              product_picture_hires,product_picture_lores,product_similarmodelscodes,product_parentmodelcode,\
              product_labcode,product_batch,product_sortorder,product_articlenumber,product_serialnumber,product_boughtbyorganisation,\
              product_labarrivaldate,product_labreportdate,product_releasedate,product_systemmodelid,product_shortname,\
              product_completename,product_modelname)
        cursor=cnn.cursor()
        cursor.execute(sql_insert2,data)
    #     product_list.append(product)# save  all product information
    print("deal with products over")
    #products-------------------------------------------------------------END

    #deal with propertygroups------------------------------BEGIN
    #create table
    sql_create_table="CREATE TABLE `propertygroups` (" \
                     "`id_propertygroup` varchar(20) NOT NULL," \
                     "`comment` varchar(45) default NULL," \
                     "`name` varchar(45) default NULL," \
                     "`timestamp_lastchange` int(12) default NULL," \
                     "`timestamp_created` int(12) default NULL," \
                     "PRIMARY KEY  (`id_propertygroup`)" \
                     ") ENGINE=MyISAM DEFAULT CHARSET=utf8"
    try:
        cursor = cnn.cursor()
        cursor.execute(sql_create_table)
    except mysql.connector.Error as e:
        print('create table propertygroups fails!{}'.format(e))
    propertygroups_node=propertygroups[0]
    propertygroup_list=[]
    propertygroup_nodes=get_xmlnode(propertygroups_node,'propertygroup')#propertygroup nodes
    for node in propertygroup_nodes:
        propertygroup_id = get_attrvalue(node,'id_propertygroup')
        propertygroup_name= get_attrvalue(node,'name')
        propertygroup_comment=get_attrvalue(node,'comment')
        propertygroup_timestamp_created=get_attrvalue(node,'timestamp_created')
        propertygroup_timestamp_lastchange=get_attrvalue(node,'timestamp_lastchange')
        propertygroup={} #save  one propertygroup information
        propertygroup['id'] ,propertygroup['name'] ,propertygroup['comment'] , propertygroup['timestamp_created'] , propertygroup['timestamp_lastchange'] = (
             propertygroup_id, propertygroup_name , propertygroup_comment , int(propertygroup_timestamp_created) ,int(propertygroup_timestamp_lastchange)
        )
        sql_insert2="insert into propertygroups (id_propertygroup,comment,name,timestamp_lastchange,timestamp_created) values (%s, %s,%s,%s,%s)"
        data=(propertygroup_id,propertygroup_comment,propertygroup_name,propertygroup_timestamp_lastchange,propertygroup_timestamp_created)
        cursor=cnn.cursor()
        cursor.execute(sql_insert2,data)

    #     propertygroup_list.append(propertygroup)# save  all propertygroup information
    print("deal with propertygroup over\n")
    #propertygroups-------------------------------------------------END

    #deal with propertys------------------------------------------BEGIN
    #create table
    sql_create_table="CREATE TABLE `propertys` (" \
                     "`id_property` varchar(20) NOT NULL default ''," \
                     "`id_propertygroup` varchar(20) NOT NULL," \
                     "`type` varchar(20) default NULL," \
                     "`comment` varchar(45) default NULL," \
                     "`name` varchar(200) default NULL," \
                     "`timestamp_lastchange` int(12) default NULL," \
                     "`timestamp_created` int(12) default NULL," \
                     "`testprogram` varchar(20) default NULL," \
                     "`use` varchar(10) default NULL," \
                     "`precision` varchar(45) default NULL," \
                     "`unit` varchar(45) default NULL," \
                     "`min` varchar(45) default NULL," \
                     "`max` varchar(45) default NULL," \
                     "`binding` varchar(45) default NULL," \
                     "`selected` int(11) default '0'," \
                     "PRIMARY KEY  (`id_property`)," \
                     "KEY `fk_propertys_propertygroups1_idx` (`id_propertygroup`)" \
                     ") ENGINE=MyISAM DEFAULT CHARSET=utf8"
    try:
        cursor = cnn.cursor()
        cursor.execute(sql_create_table)
    except mysql.connector.Error as e:
        print('create table propertys fails!{}'.format(e))
    propertys_node=propertys[0]
    property_list=[]
    property_nodes=get_xmlnode(propertys_node,'property')#property nodes
    for node in property_nodes:
        property={} #save  one property information
        property_id = get_attrvalue(node,'id_property')
        property['id']=property_id

        property_id_propertygroup = get_attrvalue(node,'id_propertygroup')
        property['id_propertygroup']=property_id_propertygroup

        property_binding = get_attrvalue(node,'binding')
        property['binding']=property_binding

        property_name= get_attrvalue(node,'name')
        property['name']=property_name

        property_comment=get_attrvalue(node,'comment')
        property['comment']=property_comment

        property_max = get_attrvalue(node,'max')
        property['max']=property_max

        property_min = get_attrvalue(node,'min')
        property['min']=property_min

        property_unit = get_attrvalue(node,'unit')
        property['unit']=property_unit

        property_precision = get_attrvalue(node,'precision')
        property['precision']=property_precision

        property_type = get_attrvalue(node,'type')
        property['type']=property_type

        property_use = get_attrvalue(node,'use')
        property['use']=property_use

        property_testprogram = get_attrvalue(node,'testprogram')
        property['testprogram']=property_testprogram

        property_timestamp_created=get_attrvalue(node,'timestamp_created')
        property['TC']=property_timestamp_created

        property_timestamp_lastchange=get_attrvalue(node,'timestamp_lastchange')
        property['TL']=property_timestamp_lastchange
        sql_insert2="insert into propertys(id_property,id_propertygroup,binding," \
                    "name,comment,max,min,unit,`precision`,type,`use`,testprogram," \
                    "timestamp_created,timestamp_lastchange)" \
                    " values (%s, %s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s," \
                    "%s,%s)"
        data=(property_id,property_id_propertygroup,property_binding,\
              property_name,property_comment,property_max,property_min,property_unit,property_precision,\
                property_type,property_use,property_testprogram,\
                property_timestamp_created,property_timestamp_lastchange)
        cursor=cnn.cursor()
        cursor.execute(sql_insert2,data)
        # property_list.append(property)# save  all propertygroup information
    print("deal with propertys over\n")
    #propertys---------------------------------------------------END

    #deal with calculationtypes--------------------------BEGIN
    #create table
    sql_create_table="CREATE TABLE `calculationtypes` (" \
                     "`id_calculationtype` varchar(20) NOT NULL," \
                     "`name` varchar(100) default NULL," \
                     "PRIMARY KEY  (`id_calculationtype`)" \
                     ") ENGINE=MyISAM DEFAULT CHARSET=utf8"
    try:
        cursor = cnn.cursor()
        cursor.execute(sql_create_table)
    except mysql.connector.Error as e:
        print('create table calculationtypes fails!{}'.format(e))
    calculationtypes_node=calculationtypes[0]
    calculationtype_list=[]
    calculationtype_nodes=get_xmlnode(calculationtypes_node,'calculationtype')#calculationtype nodes
    for node in calculationtype_nodes:
        calculationtype_id = get_attrvalue(node,'id_calculationtype')
        calculationtype_name= get_attrvalue(node,'name')
        calculationtype={} #save  one calculationtype information
        calculationtype['id'] ,calculationtype['name'] = (
             calculationtype_id, calculationtype_name
        )
        sql_insert2="insert into calculationtypes(id_calculationtype,name)" \
                    " values (%s, %s)"
        data=(calculationtype_id,calculationtype_name)
        cursor=cnn.cursor()
        cursor.execute(sql_insert2,data)
    #     calculationtype_list.append(calculationtype)# save  all calculationtype information
    print("deal with calculationtypes over\n")
    #calculationtypes------------------------------------------------END

    # #deal with evaluations-------------------------------------------BEGIN
    #create table
    sql_create_table="CREATE TABLE `evaluations` (" \
                     "`id_evaluation` varchar(20) NOT NULL," \
                     "`id_parent` varchar(20) default NULL," \
                     "`id_calculationtype` varchar(20) NOT NULL," \
                     "`name` varchar(200) default NULL," \
                     "`timestamp_lastchange` int(12) default NULL," \
                     "`timestamp_created` int(12) default NULL," \
                     "`precision` varchar(10) default NULL," \
                     "`unit` varchar(45) default NULL," \
                     "`binding` varchar(45) default NULL," \
                     "`lookupstable` varchar(45) default NULL," \
                     "`weighting_given` varchar(45) default NULL," \
                     "`weighting_normalized` varchar(45) default NULL," \
                     "`use_limiting` varchar(45) default NULL," \
                     "`use_lookupable` varchar(45) default NULL," \
                     "`use_inheritna` varchar(45) default NULL," \
                     "`evaluationchilds` varchar(45) default NULL," \
                     "`selected` int(11) DEFAULT '0'," \
                     "PRIMARY KEY  (`id_evaluation`)," \
                     "KEY `fk_evaluations_calculationtypes1_idx` (`id_calculationtype`)," \
                     "KEY `fk_evaluations_evaluations1_idx` (`id_parent`)" \
                     ") ENGINE=MyISAM DEFAULT CHARSET=utf8"
    try:
        cursor = cnn.cursor()
        cursor.execute(sql_create_table)
    except mysql.connector.Error as e:
        print('create table evaluations fails!{}'.format(e))
    evaluations_node=evaluations[0]
    evaluation_list=[]
    evaluation_nodes=get_xmlnode(evaluations_node,'evaluation')#evaluation nodes
    for node in evaluation_nodes:
        evaluation={} #save  one evaluation information
        evaluation_id = get_attrvalue(node,'id_evaluation')
        evaluation['id']=evaluation_id

        evaluation_parent=get_attrvalue(node,'id_parent')
        evaluation['id_parent']=evaluation_parent

        evaluation_id_childs = get_attrvalue(node,'id_childs')
        evaluation['id_childs']=evaluation_id_childs

        evaluation_id_calculationtype = get_attrvalue(node,'id_calculationtype')
        evaluation['id_calculationtype']=evaluation_id_calculationtype

        evaluation_name= get_attrvalue(node,'name')
        evaluation['name']=evaluation_name

        evaluation_binding=get_attrvalue(node,'binding')
        evaluation['binding']=evaluation_binding

        evaluation_use_inheritna = get_attrvalue(node,'use_inheritna')
        evaluation['use_inheritna']=evaluation_use_inheritna

        evaluation_use_lookuptable = get_attrvalue(node,'use_lookuptable')
        evaluation['use_lookuptable']=evaluation_use_lookuptable

        evaluation_unit = get_attrvalue(node,'unit')
        evaluation['unit']=evaluation_unit

        evaluation_use_limiting = get_attrvalue(node,'use_limiting')
        evaluation['use_limiting']=evaluation_use_limiting

        evaluation_weighting_normalized = get_attrvalue(node,'weighting_normalized')
        evaluation['weighting_normalized']=evaluation_weighting_normalized

        evaluation_weighting_given = get_attrvalue(node,'weighting_given')
        evaluation['weighting_given']=evaluation_weighting_given

        evaluation_lookuptable = get_attrvalue(node,'lookuptable')
        evaluation['lookuptable']=evaluation_lookuptable

        evaluation_precision = get_attrvalue(node,'precision')
        evaluation['precision']=evaluation_precision

        evaluation_timestamp_created=get_attrvalue(node,'timestamp_created')
        evaluation['TC']=evaluation_timestamp_created

        evaluation_timestamp_lastchange=get_attrvalue(node,'timestamp_lastchange')
        evaluation['TL']=evaluation_timestamp_lastchange
        sql_insert2 = "insert into evaluations(id_evaluation,id_parent,id_calculationtype," \
                      "name,timestamp_lastchange,timestamp_created," \
                      "`precision`,unit,binding,lookupstable,weighting_given," \
                      "weighting_normalized,use_limiting," \
                      "use_lookupable,use_inheritna,evaluationchilds)" \
                      " values (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s," \
                      "%s,%s,%s,%s)"
        data=(evaluation_id,evaluation_parent,evaluation_id_calculationtype,\
              evaluation_name,evaluation_timestamp_lastchange,evaluation_timestamp_created,\
              evaluation_precision,evaluation_unit,evaluation_binding,evaluation_lookuptable,evaluation_weighting_given,\
              evaluation_weighting_normalized,evaluation_use_limiting,\
              evaluation_use_lookuptable,evaluation_use_inheritna,evaluation_id_childs)
        cursor=cnn.cursor()
        cursor.execute(sql_insert2,data)
    #     evaluation_list.append(evaluation)# savepropertygroup information
    print("deal with evaluations over\n")
    #evaluations-----------------------------------------------END

    #deal with results-----------------------------------------BEGIN
    #create table
    sql_create_table="CREATE TABLE `results` (" \
                     "`id_evaluation` varchar(20) NOT NULL," \
                     "`id_product` varchar(20) NOT NULL," \
                     "`downgrading_value` varchar(45) default NULL," \
                     "`is_downgrading` tinyint(1) default NULL," \
                     "`value` varchar(150) default NULL," \
                     "PRIMARY KEY (`id_evaluation`,`id_product`),"\
                     "KEY `fk_results_evaluations1_idx` (`id_evaluation`)," \
                     "KEY `fk_results_products1_idx` (`id_product`)" \
                     ") ENGINE=MyISAM DEFAULT CHARSET=utf8"
    try:
        cursor = cnn.cursor()
        cursor.execute(sql_create_table)
    except mysql.connector.Error as e:
        print('create table results fails!{}'.format(e))
    results_node=results[0]
    result_list=[]
    result_nodes=get_xmlnode(results_node,'result')#result nodes

    for node in result_nodes:
            try:
                result_id_product = get_attrvalue(node,'id_product')
                result_id_evaluation= get_attrvalue(node,'id_evaluation')
                result_is_downgrading= int(get_attrvalue(node,'is_downgrading'))
                result_downgrading_value= get_attrvalue(node,'downgrading_value')
            except Exception as e:
                print('import results error!{}'.format(e))
            try:
                result_value=node.firstChild.data
            except Exception as e:
                print('result doesnt have value !set result_value=""')
                print("result_id_product:"+result_id_product)
                print("result_id_evaluation:"+result_id_evaluation)
                result_value=""
            # result={} #save  one calculationtype information
            sql_insert2="insert into results (id_evaluation,id_product,downgrading_value,is_downgrading,value) values (%s, %s,%s,%s,%s)"
            data=(result_id_evaluation,result_id_product,result_is_downgrading,result_downgrading_value,result_value)
            cursor=cnn.cursor()
            cursor.execute(sql_insert2,data)

    print("deal with results over\n")
    #results------------------------------------------------END

    print("createDB over")

    #ALL END
