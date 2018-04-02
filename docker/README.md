In terminal, clone ralphandrusso-docker

cd ralphandrusso-docker/ralphandrusso-server

mkdir -p var/www/html

cd var/www/html/

git clone -b development https://YOUR_USERNAME@bitbucket.org/qi-interactive/ralphandrusso.com.git .

Go to root folder (cd ../../..) and run following command

docker-compose up --build

If you have running apache server on your machine, please shut it down.

Finally, open http://ralphandrusso.localhost/ in your browser.

Pluggin in images

In order to have S3 Media, please SSH into the container and issue the following: 

sh /root/s3fs.sh

and then: 

ldconfig && s3fs ralph-and-russo-media-dev /var/www/html/shared/media -o passwd_file=/root/.s3fs,nonempty,allow_other,use_cache=/tmp,uid=1000,gid=1000
