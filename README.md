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

最新
1. 将所有表中的属性名字已经改到位，表名均已删除，调整了自增的属性，所有表中只有主键自增
2. 添加了manager表
3. 需要添加cus_hash, manager_hash, indi_hash, org_hash, author_hash表，每张表均有三列，分别为
customer_id
password
hash
其中customer_id 为对应的customer表中的主键，password为customer中的password，hash设为一个60长度的varchar，其余同理
4. 将改动完成的schema在workbench上跑起来，插入数据进行测试
5. 在运行schema之前记得检查一遍：  
只有customer， author， indi， org， 等一些表的主键才有auto_incremental， 即插入记录时主键自动生成，一定要是主键，不能是外键
