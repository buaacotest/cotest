DROP TRIGGER IF EXISTS t_afterdelete_on_products;
delimiter $$ 
CREATE TRIGGER t_afterdelete_on_products
AFTER DELETE ON products
FOR EACH ROW
BEGIN
delete from results where id_product=old.id_product;
END;$$
delimiter ;