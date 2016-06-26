FROM mysql:5.7
MAINTAINER thiagoroshi <ads.thiagoroshi@gmail.com>

# adicionando script do banco de dados
ADD ./db.sql /var/db/database.sql
COPY ./my.cnf /etc/mysql/conf.d/my.cnf
# configuraçao inicial
ENV MYSQL_ROOT_PASSWORD=rootedForAll42#
ENV MYSQL_DATABASE=code_pdo
ENV MYSQL_USER=userGuy
ENV MYSQL_PASSWORD=Pindauva

EXPOSE 3306
