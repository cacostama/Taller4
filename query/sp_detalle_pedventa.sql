create or replace function sp_detalle_pedventa(
ban integer,
vped_cod integer, 
vdep_cod integer, 
vart_cod integer, 
vped_cant integer, 
vped_precio integer) returns varchar as
$$
declare mensaje varchar;
begin
	if ban = 1 then
		perform * from detalle_pedventa where ped_cod = vped_cod and art_cod = vart_cod and dep_cod = vdep_cod;
		if not found then
			INSERT INTO detalle_pedventa(ped_cod, dep_cod, art_cod, ped_cant, ped_precio)
			VALUES (vped_cod, vdep_cod, vart_cod, vped_cant, vped_precio);	
		else
			update detalle_pedventa set ped_cant = vped_cant,ped_precio=vped_precio
			where ped_cod = vped_cod and art_cod = vart_cod and dep_cod = vdep_cod;
		end if;
		mensaje = 'Se agrego correctamente el articulo al pedido';
	end if;
	if ban = 2 then --editar
			update detalle_pedventa set ped_cant = vped_cant,ped_precio=vped_precio
			where ped_cod = vped_cod and art_cod = vart_cod and dep_cod = vdep_cod;
			mensaje = 'Se modifico correctamente el articulo al pedido';
	end if;
	if ban = 3 then --borrar
			delete from detalle_pedventa
			where ped_cod = vped_cod and art_cod = vart_cod and dep_cod = vdep_cod;
			mensaje = 'Se elimino correctamente el articulo al pedido';
	end if;	
	return mensaje;
end;
$$
language plpgsql;

