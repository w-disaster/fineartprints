-- *********************************************
-- * SQL MySQL generation                      
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.1              
-- * Generator date: Dec 19 2018              
-- * Generation date: Sun Dec 27 11:48:51 2020 
-- * LUN file: /srv/www/htdocs/fineartprints/db/FINEARTPRINTS.lun 
-- * Schema: fineartprints/3 
-- ********************************************* 


-- Database Section
-- ________________ 

create database fineartprints;
use fineartprints;


-- Tables Section
-- _____________ 

create table Art_print (
     Technique_id char(9) not null,
     Picture_title char(140) not null,
     constraint ID_Art_print_ID primary key (Picture_title, Technique_id));

create table Category (
     Name char(140) not null,
     Image longblob not null,
     Orientation char(140) not null,
     constraint ID_Category_ID primary key (Name));

create table Credit_Card (
     Expire_date date not null,
     Owner char(140) not null,
     Number bigint not null,
     constraint ID_Credit_Card_ID primary key (Number));

create table Shipper (
     Company_name char(140) not null,
     Phone int(15) not null,
     Price float(9) not null,
     constraint ID_Shipper_ID primary key (Company_name));

create table Final_product (
     Picture_title char(140) not null,
     Technique_id char(9) not null,
     Frame_id char(9) not null,
     Passpartout_id char(140) not null,
     Art_print_width int not null,
     Art_print_height int not null,
     Passpartout_width int not null,
     Order_id int not null,
     Company_name char(1) not null,
     constraint ID_Final_product_ID primary key (Picture_title, Technique_id, Frame_id, Passpartout_id));

create table Frame (
     Frame_id char(9) not null,
     Image char(1) not null,
     Description char(140) not null,
     Price float(9) not null,
     constraint ID_Frame_ID primary key (Frame_id));

create table Make_frame_available (
     Email char(140) not null,
     Frame_id char(9) not null,
     constraint ID_Make_frame_available_ID primary key (Frame_id, Email));

create table Make_passpartout_available (
     Email char(140) not null,
     Passpartout_id char(140) not null,
     constraint ID_Make_passpartout_available_ID primary key (Passpartout_id, Email));

create table Passpartout (
     Passpartout_id char(140) not null,
     Image char(1) not null,
     Specifications char(140) not null,
     Price_per_cm2 float(9) not null,
     constraint ID_Passpartout_ID primary key (Passpartout_id));

create table Payment_Info (
     Card_number bigint not null,
     Email char(140) not null,
     constraint ID_Payment_Info_ID primary key (Email, Card_number));

create table Picture (
     Title char(140) not null,
     Description char(140) not null,
     Author char(140) not null,
     Image char(1) not null,
     Base_price float(9) not null,
     Orientation char(140) not null,
     Category_name char(140) not null,
     Email char(140) not null,
     constraint ID_Picture_ID primary key (Title));

create table Print_technique (
     Technique_id char(9) not null,
     Image char(1) not null,
     Description char(140) not null,
     Price_per_cm2 float(9) not null,
     constraint ID_Print_technique_ID primary key (Technique_id));

create table Prints_order (
     Order_id int not null,
     Ship_city char(140),
     Ship_postal_code int,
     Ship_address char(140),
     Order_date date not null,
     Shipped_date date,
     Email char(140) not null,
     Card_number bigint not null,
     constraint ID_Prints_order_ID primary key (Order_id));

create table Tracking_notification (
     Tracking_notification_id int not null,
     Description char(140) not null,
     Data date not null,
     City char(140) not null,
     Postal_code int not null,
     Address char(140) not null,
     Order_id int not null,
     constraint ID_Tracking_notification_ID primary key (Tracking_notification_id));

create table User (
     Email char(140) not null,
     Birth_date date not null,
     Password char(140) not null,
     Name char(140) not null,
     Surname char(140) not null,
     Phone bigint not null,
     City char(140) not null,
     Postal_code int not null,
     Province char(140) not null,
     Address char(140) not null,
     Role int not null,
     constraint ID_User_ID primary key (Email));


-- Constraints Section
-- ___________________ 

alter table Art_print add constraint REF_Art_p_Pictu
     foreign key (Picture_title)
     references Picture (Title);

alter table Art_print add constraint REF_Art_p_Print_FK
     foreign key (Technique_id)
     references Print_technique (Technique_id);

alter table Final_product add constraint EQU_Final_Print_FK
     foreign key (Order_id)
     references Prints_order (Order_id);

alter table Final_product add constraint REF_Final_Passp_FK
     foreign key (Passpartout_id)
     references Passpartout (Passpartout_id);

alter table Final_product add constraint REF_Final_Frame_FK
     foreign key (Frame_id)
     references Frame (Frame_id);

alter table Final_product add constraint REF_Final_Art_p
     foreign key (Picture_title, Technique_id)
     references Art_print (Picture_title, Technique_id);

alter table Final_product add constraint REF_Final_Shipp_FK
     foreign key (Company_name)
     references Shipper (Company_name);

alter table Make_frame_available add constraint REF_Make__Frame
     foreign key (Frame_id)
     references Frame (Frame_id);

alter table Make_frame_available add constraint REF_Make__User_1_FK
     foreign key (Email)
     references User (Email);

alter table Make_passpartout_available add constraint REF_Make__Passp
     foreign key (Passpartout_id)
     references Passpartout (Passpartout_id);

alter table Make_passpartout_available add constraint REF_Make__User_FK
     foreign key (Email)
     references User (Email);

alter table Payment_Info add constraint REF_Payme_User
     foreign key (Email)
     references User (Email);

alter table Payment_Info add constraint REF_Payme_Credi_FK
     foreign key (Card_number)
     references Credit_Card (Number);

alter table Picture add constraint REF_Pictu_Categ_FK
     foreign key (Category_name)
     references Category (Name);

alter table Picture add constraint REF_Pictu_User_FK
     foreign key (Email)
     references User (Email);

-- Not implemented
-- alter table Prints_order add constraint ID_Prints_order_CHK
--     check(exists(select * from Final_product
--                  where Final_product.Order_id = Order_id)); 

alter table Prints_order add constraint REF_Print_Payme_FK
     foreign key (Email, Card_number)
     references Payment_Info (Email, Card_number);

alter table Tracking_notification add constraint REF_Track_Print_FK
     foreign key (Order_id)
     references Prints_order (Order_id);


-- Index Section
-- _____________ 

create unique index ID_Art_print_IND
     on Art_print (Picture_title, Technique_id);

create index REF_Art_p_Print_IND
     on Art_print (Technique_id);

create unique index ID_Category_IND
     on Category (Name);

create unique index ID_Credit_Card_IND
     on Credit_Card (Number);

create unique index ID_Shipper_IND
     on Shipper (Company_name);

create unique index ID_Final_product_IND
     on Final_product (Picture_title, Technique_id, Frame_id, Passpartout_id);

create index EQU_Final_Print_IND
     on Final_product (Order_id);

create index REF_Final_Passp_IND
     on Final_product (Passpartout_id);

create index REF_Final_Frame_IND
     on Final_product (Frame_id);

create index REF_Final_Shipp_IND
     on Final_product (Company_name);

create unique index ID_Frame_IND
     on Frame (Frame_id);

create unique index ID_Make_frame_available_IND
     on Make_frame_available (Frame_id, Email);

create index REF_Make__User_1_IND
     on Make_frame_available (Email);

create unique index ID_Make_passpartout_available_IND
     on Make_passpartout_available (Passpartout_id, Email);

create index REF_Make__User_IND
     on Make_passpartout_available (Email);

create unique index ID_Passpartout_IND
     on Passpartout (Passpartout_id);

create unique index ID_Payment_Info_IND
     on Payment_Info (Email, Card_number);

create index REF_Payme_Credi_IND
     on Payment_Info (Card_number);

create unique index ID_Picture_IND
     on Picture (Title);

create index REF_Pictu_Categ_IND
     on Picture (Category_name);

create index REF_Pictu_User_IND
     on Picture (Email);

create unique index ID_Print_technique_IND
     on Print_technique (Technique_id);

create unique index ID_Prints_order_IND
     on Prints_order (Order_id);

create index REF_Print_Payme_IND
     on Prints_order (Email, Card_number);

create unique index ID_Tracking_notification_IND
     on Tracking_notification (Tracking_notification_id);

create index REF_Track_Print_IND
     on Tracking_notification (Order_id);

create unique index ID_User_IND
     on User (Email);

