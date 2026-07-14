FROM nginx:alpine
COPY index.html /usr/share/nginx/html/index.html
COPY images /usr/share/nginx/html/images
COPY videos /usr/share/nginx/html/videos
EXPOSE 80