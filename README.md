# Project
Project for Database

1. project.zip是逻辑模型和关系模型的压缩包，解压后可用modeler打开看逻辑模型和关系模型

2. schema.sql是数据库源码，需在里面添加所有父子表的trigger，cus_room表中的主键，以及将所有pk改为自增

3. 加密完成的文件夹是大佬的php代码，php文件夹是我写的

update notes:
12/11: 
1. sponsor父表里的spon_id全部为自增，两个子类中的spon_id not null需求删除
2. indi和org两个子表中插入数据时，父表sponsor会自动生成数据

12/12:
1. 所有含pk的表将pk改为自增
2. 为customer, org, indi, author添加password列
!!!3. 我们没有manager表
4. 将cus_room的date, timeslot, room_room_id设为联合主键
5. 密码hash表暂时未更新。对需求理解不清晰