FROM mysql:5.7
MAINTAINER thiagoroshi <ads.thiagoroshi@gmail.com>

# adicionando script do banco de dados
ADD ./data/db.sql /var/db/database.sql
# configuraçao inicial
ENV user userGuy
ENV password Pindauva

EXPOSE 3306


