README


#########################PréRequis########################
1.	Machine debian9.12 Node Manager 
2.	Machine debian9.12 Serveur Web
3.	Filezila ou autre afin de transférer les fichiers



#########################Futur serveur web########################
1.	su root
2.	nano /etc/ssh/sshd_config
3.	éditer la ligne PermitRootLogin without-password PAR PermitRootLogin yes
4.	service ssh restart
5.	Si vous etes en ip fixe n’oubliez pas de mettre 8.8.8.8 en DNS



#########################Node Manager########################
1.	Si vous etes en ip fixe n’oubliez pas de mettre 8.8.8.8 en DNS
2.	su root
3.	nano /etc/ssh/sshd_config
4.	éditer la ligne PermitRootLogin without-password PAR PermitRootLogin yes
5.	service ssh restart
6.	apt install sudo
7.	nano /etc/sudoers
a.	éditer la ligne comme si dessous
i.	root	ALL=(ALL :ALL) ALL
ii.	{ton user}	ALL=(ALL :ALL) ALL
8.	exit
9.	sudo apt update
10.	sudo apt install ansible
11.	cd /etc/ansible
12.	sudo nano hosts
a.	éditer la ligne comme si dessous
i.	[labayoub]
192.168.43.200
13.	ssh-keygen -t rsa
14.	ssh-copy-id -i ~/.ssh/id_rsa.pub root@192.168. [Votre ip du futur serveur web]
15.	TEST : ansible all -m ping --user root --become --ask-become-pass
16.	lancez filezila
a.	Hote : 192.168.43.200
b.	Identifiant : root
c.	Mot de passe : le mot de passe root
d.	Port : 22 
17.	naviguer vers /etc/ansible
18.	transférer tout les fichier du lab

