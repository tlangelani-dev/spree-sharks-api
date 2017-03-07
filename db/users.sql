use tlange0_spreesharks;

create table users(
    id int auto_increment,
    email varchar(255) not null unique,
    token varchar(255) not null,
    created datetime,
    primary key(id)
)engine=innodb;

insert into users(email, token, created) values
    ('john.doe@gmail.com', 'ljhlwqfbjlkjwbfqlk2rlkjweqhlkj', now()),
    ('mike.doe@gmail.com', '237842giu423iguiu8ewkjh', now()),
    ('james.doe@gmail.com', 'k892hliqwuehrlhliqwqwlio', now());