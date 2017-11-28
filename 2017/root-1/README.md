# Custom DNS root (for internal purpose)

## Tools ##
bind9, bind9utils, libbind9-140
## Configurations ##
1 step:Install bind9
apt-get install bind9, bind9utils, libbind9-140 

2 step:edit the file "/etc/bind/named.conf.default-zones"
2-1)Comment all currents line
2-2)And add this following lines:
zone "racine."{
        type master;
        file "/etc/bind/db.racine";
};

3 step:create the file "/etc/bind/db.racine"
and we add that following lines:
;
; BIND data file for local loopback interface
;
$TTL	604800
.	IN	SOA	racine. root.racine. (
			      2		; Serial
			 604800		; Refresh
			  86400		; Retry
			2419200		; Expire
			 604800 )	; Negative Cache TTL
;
.				IN	NS	ns1.racine.
.				IN	A	192.168.10.10


4 step: create an new root.hints that will be use by the resolvers "/etc/bind/db.root.new" 
4-1:  and replace all the content by this:

;       This file holds the information on root name servers needed to
;       initialize cache of Internet domain name servers
;       (e.g. reference this file in the "cache  .  <file>"
;       configuration file of BIND domain name servers).
;
;       This file is made available by InterNIC 
;       under anonymous FTP as
;           file                /domain/named.cache
;           on server           FTP.INTERNIC.NET
;       -OR-                    RS.INTERNIC.NET
;
;       last update:    February 17, 2016
;       related version of root zone:   2016021701
;
; formerly NS.INTERNIC.NET
;
.                        3600000      NS    racine.
racine.     		 3600000      A     192.168.10.10

; End of file



5 step: To add delegation to the zone at the "top" of our namespace; in this case we edit the file "/etc/bind/db.racine" so we add those following TLD CTN and UAC at the least:
;
; BIND data file for local loopback interface
;
$TTL	604800
.	IN	SOA	racine. root.racine. (
			      2		; Serial
			 604800		; Refresh
			  86400		; Retry
			2419200		; Expire
			 604800 )	; Negative Cache TTL
;
.				IN	NS	ns1.racine.
.				IN	A	192.168.10.10
pi-register2.ctn.		IN 	NS	ns1.pi-register2.ctn.
pi-register1.uac.		IN 	NS	ns1.pi-register1.uac.
pi-register1.uac.		IN 	NS	ns2.pi-register1.uac.
pi-register2.ctn.               IN      NS      ns2.pi-register2.ctn.
ns1.pi-register2.ctn.	IN	A	192.168.20.20
ns2.pi-register2.ctn.	IN	A	192.168.20.10
ns1.pi-register1.uac.	IN	A	192.168.20.20
ns2.pi-register1.uac.	IN	A	192.168.20.10


6 step: edit the file "resolv.conf" and use "127.0.0.1" for nameserver:

nameserver       127.0.0.1



