# coding=gbk
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

    dbname="null"
    xmlname="null"
    config={'host':'127.0.0.1',#默认127.0.0.1
        'user':'root',
        'password':'123456',
        'port':3306 ,#默认即为3306
        #'database':'mobilephone', 无默认数据库
        'charset':'utf8'#默认即为utf8
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

    #select the database
    selectdbsql="use "+dbname
    try:
        cursor = cnn.cursor()
        cursor.execute(selectdbsql)
    except mysql.connector.Error as e:
        print('select database fails!{}'.format(e))

    #deal with manufacturers-----------------------BEGIN
    #drop table
    sql_drop_table="DROP TABLE IF EXISTS `manufacturers`"
    try:
        cursor = cnn.cursor()
        cursor.execute(sql_drop_table)
    except mysql.connector.Error as e:
        print('drop table manufacturers fails!{}'.format(e))
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
        manufacture={} #保存一条manufacture信息
        manufacture['id'] ,manufacture['name'] ,manufacture['comment'] , manufacture['timestamp_created'] , manufacture['timestamp_lastchange'] = (
             manufacture_id, manufacture_name , manufacture_comment , int(manufacturer_timestamp_created) ,int(manufacturer_timestamp_lastchange)
        )
        sql_insert2="insert into manufacturers (id_manufacturer,name,comment,timestamp_lastchange,timestamp_lastcreated) values (%s, %s,%s,%s,%s)"
        data=(manufacture_id,manufacture_name,manufacture_comment,manufacturer_timestamp_lastchange,manufacturer_timestamp_created)
        cursor=cnn.cursor()
        cursor.execute(sql_insert2,data)
    #     manufacture_list.append(manufacture)# 保存所有的manufacture信息
    #manufacturers---------------------------------------------END

    # #deal with productgroups-------------------------------------BEGIN
    #drop table
    sql_drop_table="DROP TABLE IF EXISTS `productgroups`"
    try:
        cursor = cnn.cursor()
        cursor.execute(sql_drop_table)
    except mysql.connector.Error as e:
        print('drop table productgroups fails!{}'.format(e))
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
        productgroup={} #保存一条productgroup信息
        productgroup['id'] ,productgroup['name'] ,productgroup['comment'] , productgroup['timestamp_created'] , productgroup['timestamp_lastchange'] = (
             productgroup_id, productgroup_name , productgroup_comment , int(productgroup_timestamp_created) ,int(productgroup_timestamp_lastchange)
        )
        sql_insert2="insert into productgroups (id_productgroup,comment,name,timestamp_lastchange,timestamp_created) values (%s, %s,%s,%s,%s)"
        data=(productgroup_id,productgroup_comment,productgroup_name,productgroup_timestamp_lastchange,productgroup_timestamp_created)
        cursor=cnn.cursor()
        cursor.execute(sql_insert2,data)
    #productgroup_list.append(productgroup)# 保存所有的producgroup信息
    #productgroups---------------------------------------------------END

    #deal with products---------------------------------------------BEGIN
    #drop table
    sql_drop_table="DROP TABLE IF EXISTS `products`"
    try:
        cursor = cnn.cursor()
        cursor.execute(sql_drop_table)
    except mysql.connector.Error as e:
        print('drop table products fails!{}'.format(e))
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
        product={} #保存一条manufacture信息
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
    #     product_list.append(product)# 保存所有的product信息
    #products-------------------------------------------------------------END

    #deal with propertygroups------------------------------BEGIN
    #drop table
    sql_drop_table="DROP TABLE IF EXISTS `propertygroups`"
    try:
        cursor = cnn.cursor()
        cursor.execute(sql_drop_table)
    except mysql.connector.Error as e:
        print('drop table propertygroups fails!{}'.format(e))
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
        propertygroup={} #保存一条propertygroup信息
        propertygroup['id'] ,propertygroup['name'] ,propertygroup['comment'] , propertygroup['timestamp_created'] , propertygroup['timestamp_lastchange'] = (
             propertygroup_id, propertygroup_name , propertygroup_comment , int(propertygroup_timestamp_created) ,int(propertygroup_timestamp_lastchange)
        )
        sql_insert2="insert into propertygroups (id_propertygroup,comment,name,timestamp_lastchange,timestamp_created) values (%s, %s,%s,%s,%s)"
        data=(propertygroup_id,propertygroup_comment,propertygroup_name,propertygroup_timestamp_lastchange,propertygroup_timestamp_created)
        cursor=cnn.cursor()
        cursor.execute(sql_insert2,data)

    #     propertygroup_list.append(propertygroup)# 保存所有的propertygroup信息
    #propertygroups-------------------------------------------------END

    #deal with propertys------------------------------------------BEGIN
    #drop table
    sql_drop_table="DROP TABLE IF EXISTS `propertys`"
    try:
        cursor = cnn.cursor()
        cursor.execute(sql_drop_table)
    except mysql.connector.Error as e:
        print('drop table propertys fails!{}'.format(e))
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
        property={} #保存一条property信息
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
        # property_list.append(property)# 保存所有的propertygroup信息
    #propertys---------------------------------------------------END

    #deal with calculationtypes--------------------------BEGIN
    #drop table
    sql_drop_table="DROP TABLE IF EXISTS `calculationtypes`"
    try:
        cursor = cnn.cursor()
        cursor.execute(sql_drop_table)
    except mysql.connector.Error as e:
        print('drop table calculationtypes fails!{}'.format(e))
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
        calculationtype={} #保存一条calculationtype信息
        calculationtype['id'] ,calculationtype['name'] = (
             calculationtype_id, calculationtype_name
        )
        sql_insert2="insert into calculationtypes(id_calculationtype,name)" \
                    " values (%s, %s)"
        data=(calculationtype_id,calculationtype_name)
        cursor=cnn.cursor()
        cursor.execute(sql_insert2,data)
    #     calculationtype_list.append(calculationtype)# 保存所有的calculationtype信息
    #calculationtypes------------------------------------------------END

    # #deal with evaluations-------------------------------------------BEGIN
    #drop table
    sql_drop_table="DROP TABLE IF EXISTS `evaluations`"
    try:
        cursor = cnn.cursor()
        cursor.execute(sql_drop_table)
    except mysql.connector.Error as e:
        print('drop table evaluations fails!{}'.format(e))
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
        evaluation={} #保存一条evaluation信息
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
    #     evaluation_list.append(evaluation)# 保存所有的propertygroup信息
    #evaluations-----------------------------------------------END

    #deal with results-----------------------------------------BEGIN
    #drop table
    sql_drop_table="DROP TABLE IF EXISTS `results`"
    try:
        cursor = cnn.cursor()
        cursor.execute(sql_drop_table)
    except mysql.connector.Error as e:
        print('drop table results fails!{}'.format(e))
    #create table
    sql_create_table="CREATE TABLE `results` (" \
                     "`id_evaluation` varchar(20) NOT NULL," \
                     "`id_product` varchar(20) NOT NULL," \
                     "`downgrading_value` varchar(45) default NULL," \
                     "`is_downgrading` tinyint(1) default NULL," \
                     "`value` varchar(150) default NULL," \
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
        result_id_product = get_attrvalue(node,'id_product')
        result_id_evaluation= get_attrvalue(node,'id_evaluation')
        result_is_downgrading= int(get_attrvalue(node,'is_downgrading'))
        result_downgrading_value= get_attrvalue(node,'downgrading_value')
        result_value=node.firstChild.data
        result={} #保存一条calculationtype信息
        sql_insert2="insert into results (id_evaluation,id_product,downgrading_value,is_downgrading,value) values (%s, %s,%s,%s,%s)"
        data=(result_id_evaluation,result_id_product,result_is_downgrading,result_downgrading_value,result_value)
        cursor=cnn.cursor()
        cursor.execute(sql_insert2,data)
    #results------------------------------------------------END

    print("updateDB over")
    #ALL END
