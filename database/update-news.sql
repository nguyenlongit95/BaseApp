-- Update table `news` add new column `view_count`

ALTER TABLE `news` ADD `view_count` int(11) NULL DEFAULT '0' AFTER `custom_layout`;

--