# Dump do banco de dados
## Script de criação da tabela Livro
```sql
 create table `Livro` (
     `Codl` bigint unsigned not null auto_increment primary key, 
     `Titulo` varchar(40) not null, 
     `Editora` varchar(40) not null, 
     `Edicao` int not null, 
     `AnoPublicacao` varchar(4) not null
) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
```

## Script de criação da tabela Autor
```sql
create table `Autor` (
    `CodAu` bigint unsigned not null auto_increment primary key, 
    `Nome` varchar(40) not null
) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
```

## Script de criação da tabela Assunto
```sql
create table `Assunto` (
    `CodAs` bigint unsigned not null auto_increment primary key, 
    `Descricao` varchar(20) not null
) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
```

## Script de criação da tabela Livro_Autor
```sql
create table `Livro_Autor` (
    `Livro_Codl` bigint unsigned not null, 
    `Autor_CodAu` bigint unsigned not null
) default character set utf8mb4 collate 'utf8mb4_unicode_ci';

alter table `Livro_Autor` add constraint `Livro_Autor_FKIndex1` foreign key (`Livro_Codl`) references `Livro` (`Codl`) on delete cascade;
alter table `Livro_Autor` add constraint `Livro_Autor_FKIndex2` foreign key (`Autor_CodAu`) references `Autor` (`CodAu`) on delete cascade;
alter table `Livro_Autor` add unique `Livro_Autor_Unique_Index`(`Livro_Codl`, `Autor_CodAu`);
```

## Script de criação da tabela Livro_Assunto
```sql
create table `Livro_Assunto` (
    `Livro_Codl` bigint unsigned not null, 
    `Assunto_CodAs` bigint unsigned not null
) default character set utf8mb4 collate 'utf8mb4_unicode_ci';

alter table `Livro_Assunto` add constraint `Livro_Assunto_FKIndex1` foreign key (`Livro_Codl`) references `Livro` (`Codl`) on delete cascade;
alter table `Livro_Assunto` add constraint `Livro_Assunto_FKIntex2` foreign key (`Assunto_CodAs`) references `Assunto` (`CodAs`) on delete cascade;
alter table `Livro_Assunto` add unique `Livro_Assunto_Unique_Index`(`Livro_Codl`, `Assunto_CodAs`);
```

## Script de criação das views
```sql
CREATE VIEW Relatorio AS (
   SELECT li.Codl,
          li.Titulo,
          GROUP_CONCAT(DISTINCT a.Nome ORDER BY a.Nome SEPARATOR ', ') As Autor,
          GROUP_CONCAT(DISTINCT ass.Descricao ORDER BY ass.Descricao SEPARATOR ', ') AS Assunto,
          li.Edicao,
          li.Editora,
          li.AnoPublicacao
      FROM Livro li
 LEFT JOIN Livro_Autor la ON li.Codl = la.Livro_Codl
 LEFT JOIN Autor a ON la.Autor_CodAu = a.CodAu
 LEFT JOIN Livro_Assunto las ON li.Codl = las.Livro_Codl
 LEFT JOIN Assunto ass ON las.Assunto_CodAs = ass.CodAs
  GROUP BY li.Codl,
           li.Titulo,
           li.Edicao,
           li.Editora,
           li.AnoPublicacao
  ORDER BY Autor
);

CREATE VIEW Relatorio_Autor AS (
    SELECT au.Nome,
           COUNT(li.Codl) AS Qde
      FROM Autor au
INNER JOIN Livro_Autor la ON au.CodAu = la.Autor_CodAu
INNER JOIN Livro li ON la.Livro_Codl = li.Codl
  GROUP BY au.Nome
  ORDER BY au.Nome
);

CREATE VIEW Relatorio_Assunto AS (
    SELECT ass.Descricao,
           COUNT(li.Codl) AS Qde
      FROM Assunto ass
INNER JOIN Livro_Assunto las ON ass.CodAs = las.Assunto_CodAs
INNER JOIN Livro li ON las.Livro_Codl = li.Codl
  GROUP BY ass.Descricao
  ORDER BY ass.Descricao
);
```
