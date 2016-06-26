FROM nginx:alpine
# remove unecesary files
RUN rm /etc/nginx/conf.d/default.conf
# up myFiles
COPY nginx.conf /etc/nginx/nginx.conf
COPY site.conf /etc/nginx/sites-avaliable/default
#COPY ../../app /usr/share/nginx/html
