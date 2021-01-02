#!/bin/bash
sudo yum install httpd -y
sudo service httpd start
chkconfig httpd on
