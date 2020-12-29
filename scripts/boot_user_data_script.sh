sudo su
sudo yum update -y

sudo yum install httpd php php-mysqlnd php-pecl-memcache php-pecl-apcu php-gd php-mbstring -y --skip-broke

sudo yum install ruby -y
sudo yum install wget -y
cd /home/ec2-user
wget https://aws-codedeploy-eu-central-1.s3.amazonaws.com/latest/install
chmod +x ./install
sudo ./install auto
sudo service codedeploy-agent status
service httpd start
chkconfig httpd on
