create or replace function ft_insertar_stock()
returns trigger as
$$
begin
	perform * from stock where dep_cod = new.dep_cod and art_cod = new.art_cod;
	if not found then
		INSERT INTO stock(dep_cod, art_cod, cant_minima, stoc_cant)
		    VALUES (new.dep_cod, new.art_cod, 1, 0);
	end if;
	return new;
end;
$$
language plpgsql;
--trigger
create trigger tg_insertar_stock
before insert on detalle_pedventa
for each row execute procedure ft_insertar_stock();