-- *********************************************
-- * SQL MySQL generation                      
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.1              
-- * Generator date: Dec 19 2018              
-- * Generation date: Sat Dec 26 10:54:13 2020 
-- * LUN file: /srv/www/htdocs/fineartprints/db-updated/FINEARTPRINTS.lun 
-- * Schema: Relazionale/2 
-- ********************************************* 


-- Database Section
-- ________________ 

create database Relazionale;
use Relazionale;


-- Tables Section
-- _____________ 

create table Art_print (
     Description char(1) not null,
     Title char(1) not null,
     constraint IDArt_print primary key (Title, Description));

create table Category (
     Name char(1) not null,
     Description char(1) not null,
     constraint IDCategory primary key (Name));

create table Credit_Card (
     Expire date char(1) not null,
     Owner char(1) not null,
     Number char(1) not null,
     constraint IDCredit_Card primary key (Number));

create table Final_product (
     Title char(1) not null,
     Description char(1) not null,
     Passpartout_image char(1) not null,
     Frame_image char(1) not null,
     Art_print_width char(1) not null,
     Art_print_height char(1) not null,
     Passpartout_width char(1) not null,
     Order_id char(1) not null,
     constraint IDFinal_product primary key (Title, Description, Frame_image, Passpartout_image));

create table Frame (
     Frame_image char(1) not null,
     Description char(1) not null,
     Price char(1) not null,
     constraint IDFrame primary key (Frame_image));

create table Make_frame_available (
     Frame_image char(1) not null,
     Email char(1) not null,
     constraint IDmake_frame_available primary key (Frame_image, Email));

create table Make_passpartout_available (
     Email char(1) not null,
     Passpartout_image char(1) not null,
     constraint IDmake_passpartout_available primary key (Passpartout_image, Email));

create table Order (
     Order_id char(1) not null,
     Ship_city char(1),
     Ship_postal_code char(1),
     Ship_address char(1),
     Order_date char(1) not null,
     Shipped_date char(1),
     Email char(1) not null,
     Number char(1) not null,
     constraint IDOrder_ID primary key (Order_id));

create table Passpartout (
     Passpartout_image char(1) not null,
     Specifications char(1) not null,
     Price_per_cm2 char(1) not null,
     constraint IDPasspartout primary key (Passpartout_image));

create table Payment_Info (
     Email char(1) not null,
     Number char(1) not null,
     constraint IDPayement_Info primary key (Email, Number));

create table Picture (
     Title char(1) not null,
     Description char(1) not null,
     Author char(1) not null,
     Image char(1) not null,
     Base_price char(1) not null,
     Orientation char(1) not null,
     Email char(1) not null,
     Category_name char(1) not null,
     constraint IDPainting primary key (Title));

create table Print_technique (
     Technique_title char(1) not null,
     Price_per_cm2 char(1) not null,
     constraint IDPainting_technique primary key (Technique_title));

create table Tracking_notification (
     Tracking_notification_id char(1) not null,
     Data char(1) not null,
     City char(1) not null,
     Postal_code char(1) not null,
     Address char(1) not null,
     Order_id char(1) not null,
     constraint IDTracking_notification primary key (Tracking_notification_id));

create table User (
     Email char(1) not null,
     New attribute char(1) not null,
     Birth_date char(1) not null,
     Password char(1) not null,
     Name char(1) not null,
     Surname char(1) not null,
     Phone char(1) not null,
     City char(1) not null,
     Postal_code char(1) not null,
     Province char(1) not null,
     Address char(1) not null,
     Role char(1) not null,
     constraint IDUser primary key (Email));


-- Constraints Section
-- ___________________ 

alter table Art_print add constraint FKreferred_to
     foreign key (Title)
     references Picture (Title);

alter table Art_print add constraint FKmade_with
     foreign key (Description)
     references Print_technique (Technique_title);

alter table Final_product add constraint FKFin_Ord
     foreign key (Order_id)
     references Order (Order_id);

alter table Final_product add constraint FKframe_included
     foreign key (Frame_image)
     references Frame (Frame_image);

alter table Final_product add constraint FKpasspartout_included
     foreign key (Passpartout_image)
     references Passpartout (Passpartout_image);

alter table Final_product add constraint FKart_print_included
     foreign key (Title, Description)
     references Art_print (Title, Description);

alter table Make_frame_available add constraint FKmak_Use
     foreign key (Email)
     references User (Email);

alter table Make_frame_available add constraint FKmak_Fra
     foreign key (Frame_image)
     references Frame (Frame_image);

alter table Make_passpartout_available add constraint FKmak_Pas
     foreign key (Passpartout_image)
     references Passpartout (Passpartout_image);

alter table Make_passpartout_available add constraint FKmak_Use_1
     foreign key (Email)
     references User (Email);

-- Not implemented
-- alter table Order add constraint IDOrder_CHK
--     check(exists(select * from Final_product
--                  where Final_product.Order_id = Order_id)); 

alter table Order add constraint FKmake
     foreign key (Email, Number)
     references Payment_Info (Email, Number);

alter table Payment_Info add constraint FKhas  
     foreign key (Number)
     references Credit_Card (Number);

alter table Payment_Info add constraint FKconcern 
     foreign key (Email)
     references User (Email);

alter table Picture add constraint FKsells
     foreign key (Email)
     references User (Email);

alter table Picture add constraint FKCategoryName
     foreign key (Category_name)
     references Category (Name);

alter table Tracking_notification add constraint FKconcern
     foreign key (Order_id)
     references Order (Order_id);


-- Index Section
-- _____________ 

