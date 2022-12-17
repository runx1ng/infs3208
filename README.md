# infs3208 Project

Project Setup: <br />
1.First, we need to create docker machines by using the command:  docker-machine create <br />
2.Next, we need to open the TCP port 2377, TCP and UDP port 7946, and UDP port 4789 for the project. <br />
3.Open a terminal and ssh into the machine and create a new swarm on the manager node by running the following command: sudo docker-swarm init __advertise-addr  $(hostname -i) <br />
4.Jump to the worker nodes and join to the swarm by running: sudo docker machine join <br />
5.Finally, we can deploy our compose file by running the following command in our manager node: sudo docker stack deploy -c docker-compose.yml <br />
6.After the deploy command, we can now access the webpage by using the external_ip:8080 to start visiting the website and the phpMyAdmin by the external_ip:8082.
7.The username and password for phpMyAdmin: php.  <br />
8. Also, the database name that the website is linked with is called “cloud_computing”. <br />
9.You may also import the sql script file named “cloud_computing” given in the folder to have some users, images, and comments to start with. <br />
10.Note: I have used move_uploaded_file function in my process-upload.php file and may cause “failed to open stream: Permission denied” when moving uploaded images to the images folder. <br />
	To solve the error, you may need to run the following commands: chown www-data your_path/images, and chmod 755 your_path/images where “www-data” is the default user. You can also uncomment the "echo exec('whoami');" code to find out the user. <br />
