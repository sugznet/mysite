use DSUGIYAMA;
drop table if exists post;
create table post(
    id INT(11) NOT NULL AUTO_INCREMENT,
    kind VARCHAR(11) NOT NULL,
    title VARCHAR(63) NOT NULL,
    slug VARCHAR(63) NOT NULL,
    thumbnail VARCHAR(225) NOT NULL,
    created_date DATETIME,
    updated_date DATETIME,
    PRIMARY KEY (id)
);

drop table if exists tag;
create table tag(
    id INT(11) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(63) NOT NULL,
    slug VARCHAR(63) NOT NULL,
    PRIMARY KEY(id)
);

drop table if exists tag_map;
create table tag_map(
    id INT(11) NOT NULL AUTO_INCREMENT,
    post_id INT(11),
    tag_id INT(11),
    `description` VARCHAR(255),
    PRIMARY KEY(id),
    FOREIGN KEY(post_id) REFERENCES post(id),
    FOREIGN KEY(tag_id) REFERENCES tag(id)
);
