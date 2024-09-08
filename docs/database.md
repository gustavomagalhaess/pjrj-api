# Dump do banco de dados
## Book table script.
```sql
 create table 'books' (
     'id' bigint unsigned not null auto_increment primary key, 
     'title' varchar(40) not null, 
     'publisher' varchar(40) not null, 
     'edition' int not null, 
     'published_at' varchar(4) not null
) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
```

## Author table script.
```sql
create table 'authors' (
    'id' bigint unsigned not null auto_increment primary key, 
    'name' varchar(40) not null
) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
```

## Subject table script.
```sql
create table 'subjects' (
    'id' bigint unsigned not null auto_increment primary key, 
    'description' varchar(20) not null
) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
```

## Author Book pivot table script.
```sql
create table 'author_book' (
    'book_id' bigint unsigned not null, 
    'author_id' bigint unsigned not null
) default character set utf8mb4 collate 'utf8mb4_unicode_ci';

alter table 'author_book' add constraint 'author_book_index_1' foreign key ('book_id') references 'books' ('id') on delete cascade;
alter table 'author_book' add constraint 'author_book_index_2' foreign key ('author_id') references 'authors' ('id') on delete cascade;
alter table 'author_book' add unique 'author_book_unique_index'('author_id', 'book_id');
```

## Book subject pivot table script.
```sql
create table 'book_subject' (
    'book_id' bigint unsigned not null, 
    'subject_id' bigint unsigned not null
) default character set utf8mb4 collate 'utf8mb4_unicode_ci';

alter table 'book_subject' add constraint 'book_subject_index_1' foreign key ('book_id') references 'books' ('id') on delete cascade;
alter table 'book_subject' add constraint 'book_subject_index_2' foreign key ('subject_id') references 'subjects' ('id') on delete cascade;
alter table 'book_subject' add unique 'book_subject_unique_index'('book_id', 'subject_id');
```

## Views scripts.
```sql
CREATE VIEW report AS (
   SELECT b.id,
          b.title,
          GROUP_CONCAT(DISTINCT a.name ORDER BY a.name SEPARATOR ', ') AS authors,
          GROUP_CONCAT(DISTINCT s.description ORDER BY s.description SEPARATOR ', ') AS subjects,
          b.edition,
          b.publisher,
          b.published_at
      FROM books b
 LEFT JOIN author_book ab ON b.id = ab.book_id
 LEFT JOIN authors a ON ab.author_id = a.id
 LEFT JOIN book_subject bs ON b.id = bs.book_id
 LEFT JOIN subjects s ON bs.subject_id = s.id
  GROUP BY b.id,
           b.title,
           b.edition,
           b.publisher,
           b.published_at
  ORDER BY authors
);

CREATE VIEW report_author AS (
    SELECT a.name,
           COUNT(b.id) AS Qde
      FROM authors a
INNER JOIN author_book ab ON a.id = ab.author_id
INNER JOIN books b ON ab.book_id = b.id
  GROUP BY a.name
  ORDER BY a.name
);

CREATE VIEW report_subject AS (
    SELECT s.description,
           COUNT(li.id) AS Qde
      FROM subjects s
INNER JOIN book_subject bs ON s.id = bs.subject_id
INNER JOIN books b ON bs.book_id = b.id
  GROUP BY s.description
  ORDER BY s.description
);
```
