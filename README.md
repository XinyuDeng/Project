# Project
Project for Database

1. 用oracle.modeler打开逻辑模型  
将project文件夹及project.dmd文件放在同一目录下即可将dmd文件打开

2. 关系模型生成的原始数据库代码  
schema.ddl文件为关系模型生成的原始数据库代码，语法为oracle的格式，需要用https://www.sqlines.com/online转换为mysql的格式才能在mysql workbench里跑通。
建议别自己转，我已转好并做了必要改动，最终该版本为schema.sql.

3. 约束添加和数据插入  
data.sql, constrints.sql. 使用时不用跑constrints.sql, 只需添加data即可

4. 触发器  
数据库原始自带触发器我已全部改为跑的通的版本，不需要再改动  
trigger.sql文件为单独的触发器，但还未改动到位，invoiceID无法在rental表中更新
