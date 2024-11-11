tar -czvf jimmysmaze.tar .
scp jimmysmaze.tar root@96.126.117.182:/root/jimmysmaze

ssh root@96.126.117.182
cd /root/jimmysmaze

tar -xzvf jimmysmaze.tar

docker-compose up