FROM centos:centos7

# -----------------------------------------------------------------------------
# Import the RPM GPG keys for Repositories
# -----------------------------------------------------------------------------
RUN rpm -Uvh https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm \
	&& rpm -Uvh https://mirror.webtatic.com/yum/el7/webtatic-release.rpm

# -----------------------------------------------------------------------------
# Apache + PHP
# -----------------------------------------------------------------------------
RUN	yum -y update \
	&& yum --setopt=tsflags=nodocs -y install --nogpgcheck \
	gcc \
	gcc-c++ \
    psmisc \
	httpd \
    git \
    zip \
	php70w \
	php70w-cli \
	php70w-devel \
	php70w-mysql \
	php70w-pdo \
	php70w-mbstring \
	php70w-soap \
	php70w-gd \
	php70w-xml \
	php70w-pecl-apcu \
    php70w-intl \
    composer \
	unzip \
    wget \
    nano \
    tar -y \
	&& rm -rf /var/cache/yum/* \
	&& yum clean all

# -----------------------------------------------------------------------------
# UTC Timezone & Networking
# -----------------------------------------------------------------------------
RUN ln -sf /usr/share/zoneinfo/UTC /etc/localtime \
	&& echo "NETWORKING=yes" > /etc/sysconfig/network

RUN sed -i '/<Directory \"\/var\/www\/html\">/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/httpd/conf/httpd.conf


# -----------------------------------------------------------------------------
# Global PHP configuration changes
# -----------------------------------------------------------------------------
RUN sed -i \
	-e 's~^;date.timezone =$~date.timezone = UTC~g' \
	-e 's~^;user_ini.filename =$~user_ini.filename =~g' \
	-e 's~^;always_populate_raw_post_data = -1$~always_populate_raw_post_data = -1~g' \
	/etc/php.ini

# -----------------------------------------------------------------------------
# Virtual hosts configuration
# -----------------------------------------------------------------------------
ADD etc/httpd/conf.d/ /etc/httpd/conf.d

# -----------------------------------------------------------------------------
# Remove packages
# -----------------------------------------------------------------------------
RUN rm -rf /var/cache/yum/* \
	&& yum clean all

# -----------------------------------------------------------------------------
# Set default environment variables used to configure the service container
# -----------------------------------------------------------------------------
ENV	APP_HOME_DIR /var/www/html
ENV	DATE_TIMEZONE UTC
ENV	HTTPD /usr/sbin/httpd
ENV	SUEXECUSERGROUP false
ENV APACHE_SERVER_NAME="portal2.localhost"
ENV APACHE_SERVER_ALIAS=""
ENV	TERM xterm

# -----------------------------------------------------------------------------
# Set volume
# -----------------------------------------------------------------------------
VOLUME ["/var/www/html"]

WORKDIR /var/www/html

ADD . /var/www/html/

# -----------------------------------------------------------------------------
# Set ports
# -----------------------------------------------------------------------------
EXPOSE 80

CMD ["/usr/sbin/httpd", "-DFOREGROUND"]
