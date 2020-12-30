sudo su

sudo yum update -y 

sudo amazon-linux-extras install -y php7.2
sudo yum install php-mysqlnd php-pecl-memcache php-pecl-apcu php-gd php-mbstring -y --skip-broken

sudo yum install ruby -y
sudo yum install wget -y

cd /home/ec2-user
wget https://aws-codedeploy-eu-central-1.s3.amazonaws.com/latest/install
chmod +x ./install
sudo ./install auto

sudo service codedeploy-agent status

sudo yum install httpd -y
sudo service httpd start
chkconfig httpd on
