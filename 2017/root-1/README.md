# Custom DNS root (for internal purpose)

## Tools ##
`bind9, bind9utils, libbind9-140`

## Configurations ##
### 1 - Install bind9 ###

`apt-get install bind9, bind9utils, libbind9-140 `

### 2 - Configuration of root zone  ###
Backup configuration file `/etc/bind/named.conf.default-zones` and create new one:

Comment all currents line and leave following lines:

```
zone "."{
        type master;
        file "/etc/bind/db.racine";
};
```

Create new `/etc/bind/db.racine` file and add following content:

```
;
; BIND data file for local loopback interface
;
$TTL	604800
.	IN	SOA	ns1.racine. contact.racine. (
		     2017112401 	; Serial
			 604800		; Refresh
			  86400		; Retry
			2419200		; Expire
			 604800 )	; Negative Cache TTL
;
.				IN	NS	ns1.racine.
.				IN	A	192.168.10.10
```

### 3 - New root.hints ###
Create an new `root.hints` that will be use by the resolvers with content

```
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
.                        3600000      NS    ns1.racine.
ns1.racine.     	 3600000      A     192.168.10.10

; End of file

```

### 4 - Add TLD delegation ###
To add delegation to the zone at the "top" of our namespace, we edit the file `/etc/bind/db.racine` to add following TLD : `ctn.` and `uac.`:

```
;
; BIND data file for local loopback interface
;
$TTL	604800
.	IN	SOA	ns1.racine. root.racine. (
			      2		; Serial
			 604800		; Refresh
			  86400		; Retry
			2419200		; Expire
			 604800 )	; Negative Cache TTL
;
.				IN	NS	ns1.racine.
.				IN	A	192.168.10.10
ctn.            IN      NS      ns2.pi-register2.ctn.
ctn.		IN 	NS	ns1.pi-register2.ctn.
uac.		IN 	NS	ns1.pi-register1.uac.
uac.		IN 	NS	ns2.pi-register1.uac.

ns1.pi-register2.ctn.	IN	A	192.168.20.10
ns2.pi-register2.ctn.	IN	A	192.168.20.20
ns1.pi-register1.uac.	IN	A	192.168.20.20
ns2.pi-register1.uac.	IN	A	192.168.20.10
```

### 5 - Force usage of local DNS server ###
Edit the file `/etc/resolv.conf` and use `127.0.0.1` for nameserver:

`nameserver       127.0.0.1`



