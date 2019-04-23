#!/bin/bash

if  `timeout 5 ping 10.0.2.14 &>/dev/null` 
	then 
	echo "Working"

else 
	echo "Host not Found" >> ~/Desktop/failedconnect.txt
	pAs="passwd"
	# Go to master FE ad change ip in :
	# /var/www/ishop/rabbitMQFiles/
	# change  testRabbitMQ.ini

echo "Deleteing testRabbitMQ.ini from FE..."
sshpass -p ${pAs} ssh -t root@10.0.2.17 "cd /var/www/ishop/rabbitMQFiles; sudo rm -r testRabbitMQ.ini;"

echo "Sending FE new File..."
sshpass -p "passwd" scp testRabbitMQ.ini root@"10.0.2.17":/var/www/ishop/rabbitMQFiles/

echo "Restarting apache on FE..."
sshpass -p ${pAs} ssh -t root@10.0.2.17 "sudo systemctl restart apache2.service"

fi


