/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     4. 06. 2017 19:37:13                         */
/*==============================================================*/


drop table if exists Participating;

drop table if exists Projects;

drop table if exists Users;

/*==============================================================*/
/* Table: Participating                                         */
/*==============================================================*/
create table Participating
(
   ID_User              int not null,
   ID_Project           int not null,
   primary key (ID_User, ID_Project)
);

/*==============================================================*/
/* Table: Projects                                              */
/*==============================================================*/
create table Projects
(
   ID_Project           int not null AUTO_INCREMENT,
   ProjectName          text not null,
   Description          text not null,
   Category             text,
   Participants         text,
   primary key (ID_Project)
);

/*==============================================================*/
/* Table: Users                                                 */
/*==============================================================*/
create table Users
(
   ID_User              int not null AUTO_INCREMENT,
   Username             text not null,
   Password             text not null,
   Name                 text not null,
   Lastname             text not null,
   ProfilePicture       longblob,
   Email                text,
   primary key (ID_User)
);

alter table Participating add constraint FK_Relationship_1 foreign key (ID_User)
      references Users (ID_User) on delete restrict on update restrict;

alter table Participating add constraint FK_Relationship_2 foreign key (ID_Project)
      references Projects (ID_Project) on delete restrict on update restrict;

