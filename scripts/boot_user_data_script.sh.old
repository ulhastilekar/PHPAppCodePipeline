sudo su

sudo yum install http://rpms.remirepo.net/enterprise/remi-release-7.rpm -y 
sudo yum install yum-utils -y
sudo yum-config-manager --enable remi-php72
sudo yum update -y 

#sudo yum install httpd php72 php72-php-mysqlnd php72-php-pecl-memcache php72-php-pecl-apcu php72-php-gd php-php-mbstring -y --skip-broken

sudo amazon-linux-extras install -y php7.2
sudo yum install httpd php-mysqlnd php-pecl-memcache php-pecl-apcu php-gd php-mbstring -y --skip-broken

sudo yum install ruby -y
sudo yum install wget -y
cd /home/ec2-user
wget https://aws-codedeploy-eu-central-1.s3.amazonaws.com/latest/install
chmod +x ./install
sudo ./install auto
sudo service codedeploy-agent status
service httpd start
chkconfig httpd on
