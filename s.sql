select `p`.`id` AS `master_places_id`,`p`.`building_name` AS `building_name`,`p`.`address_id` AS `address_id`,`p`.`created_by` AS `created_by`,`u`.`id` AS `units_id`,`u`.`places_id` AS `places_id`,`u`.`damage_size` AS `damage_size`,`u`.`owner_idc` AS `owner_idc` 
from `relief`.`damaged_residential_units` `u` left join `relief`.`damaged_residential_places` `p` 
where `p`.`id` = `u`.`places_id`



select `p`.`id` AS `master_places_id`,`p`.`building_name` AS `building_name`,`p`.`address_id` AS `address_id`,`p`.`created_by` AS `created_by`,`u`.`id` AS `units_id`,`u`.`places_id` AS `places_id`,`u`.`damage_size` AS `damage_size`,`u`.`owner_idc` AS `owner_idc` 
FROM `relief`.`damaged_residential_places` `p` 
LEFT JOIN `relief`.`damaged_residential_units` `u`
ON `p`.`id` = `u`.`places_id`