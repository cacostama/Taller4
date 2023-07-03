create view v_pedido_cabventa as
SELECT a.ped_cod, to_char(a.ped_fecha,'dd/mm/yyyy') as ped_fecha,
 a.emp_cod,(b.emp_nombre||' '||b.emp_apellido) as empleado, 
 a.cli_cod,c.cli_ci,(c.cli_nombre||' '||c.cli_apellido) as cliente,
  (case a.estado when 'P' then 'PENDIENTE' when 'C' then 'CONFIRMADO' else 'ANULADO' end) as estado,
   a.id_sucursal,d.suc_descri,
   (select coalesce(sum(ped_cant*ped_precio),0) from detalle_pedventa where ped_cod =a.ped_cod) as ped_total,
   convertir_letra((select coalesce(sum(ped_cant*ped_precio),0) from detalle_pedventa where ped_cod =a.ped_cod))as totalletra
  FROM pedido_cabventa a
  join empleado b on a.emp_cod = b.emp_cod
  join clientes c on a.cli_cod = c.cli_cod
  join sucursal d on a.id_sucursal = d.id_sucursal;
