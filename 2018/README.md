# DNSathon 2018 #

The 2nd DNS Hackathon was held October 11-12, 2018 as part of Benin DNS Forum activities in Cotonou, BJ. 

In each subdirectory contains the materials submitted and archived by the participants organized by team name.

## Infrastructure ##

### Network ###
We have used Cisco devices:
* Swithes:
  - Access: Cisco WS-C2950T-24 Catalyst 2950 24 Ports 
  - Noc: Cisco WS-C2960-24TC-S 2960 Series 24 Port
* Router: 1800 Series
Patch cables has been used to connect all components: Raspberry-Pi, team member laptop, switches and router. Network management has been handle by Infrastructure team. 

#### Transit ####
International connectivity has been assured by the sponsor Jeny SAS.

### Network devices pre-configuration ###
1 Console access
2 Create SVI for vlan 60 on switches
3 Create subinterface for vlan 60 on router
4 Test network reachalibity using those assigned IPs to network devices
5 Run ansible playbook to finish the configuration


#### Servers #####
For each server, we assign IP based on following IP adressing plan:


| Id | Role | # | Hostname | IP | GW | Vlan | Resolvers |
| ----- | --- | ----- | --- | ---- | --- | -- | --- |
| 1 | **Root** | 1 | `pi-root` | 10.10.10.10/24 | 10.10.10.1 | 10 | 10.10.40.10 |
| 2 | **Registry** | 1 | `pi-registry-1` | 10.10.20.10/24 | 10.10.20.1 | 20 | 10.10.40.10 |
| 3 | **Registry** | 2 | `pi-registry-2` | 10.10.20.20/24 | 10.10.20.1 | 20 | 10.10.40.10 |
| 4 | **Registrar** | 1 | `pi-registrar-1` | 10.10.30.10/24 | 10.10.30.1 | 30 | 10.10.40.10 |
| 5 | **Resolver** | 1 | `pi-resolver-1` | 10.10.40.10/24 | 10.10.40.1 | 40 | 127.0.0.1 |

An addtional **Management** Pi has been added to server as:
* DNS resolver (infrastructure)
* Monitoring
* Statistics



#### Router and swithes #####
Router and switches have the following adressing plan. Note that, the network infrastructure has his own resolver handled by the management Pi.


| Id | Role | # | Hostname | IP | GW | Vlan | Resolvers |
| ----- | --- | ----- | --- | ---- | --- | -- | --- |
| 1 | **Router** | 1 | `dns-noc-router` | 10.10.10-60.1 | `Transit GW` | 10-60 | 10.10.60.5 |
| 2 | **Switch** | 1 | `dns-sw-noc` | 10.10.10-60.20/24 | 10.10.60.1 | 10-60 | 10.10.60.5 |
| 3 | **Switch** | 2 | `dns-sw-access` | 10.10.10-60.25/24 | 10.10.60.1 | 10-60 | 10.10.60.5 |



#### Design ####
In a nutshell, we have setup following network design
![Infrastructure Overview](https://raw.githubusercontent.com/AlfredArouna/DNSathon/master/2018/dnsathon.png)


### Servers ###

#### Materials ####
We use Raspberry-Pi 3 Model B as servers. For each one, we use the default pre-installed OS: `Raspbian`. 

#### Services ####
With servers, we will offer DNS services, such as:
* Root
* Registries
* Registrars
* Resolvers


## Actitivies Report (draft) ##
DNShathon draft is available  ![here](https://raw.githubusercontent.com/AlfredArouna/DNSathon/master/2018/dnsathon_activities_report_draft.pdf)

## Teams ##

### Réseau Interconnexion et Test ###
* ***KOUGNIMON Jésugnon Elisée***
* ZINSOU Exupéry (spokeperson)
* JOACHIM Bébert
* KPOSSOU Roland
* SEMASSA Luc
* ENONZAN Cédric
* TOUPE Jacob
* AROUME Armand T


### Communication ###
* ***AGUIAR Morel***
* AZONGNIBO Bruce 
* BINAZON Ghislain
* FADJINOU Lionel
* ODJO Mohamed
* HOUNSOU Lionel
* HOUNKPEVI Larios
* ADIMI Oscar 

### Root ####
* ***TOBADA Capwel***
* TONOUKOUEN Carolle (spokeperson)
* TONAMON Florent
* TACOLODJOU Emanuel
* HOUNSOU Kanneteh 
* DEDO Gerryd
* SAMAD Leadi

### Registry ###
#### Registry-1 ####
* ***DOSSOU Israel***
* ABOH Melvina (spokeperson)
* SESSOU Géraud
* SEGLA Ulrich
* ADEKPLOVI Emmanuel

#### Registry-2 ####
* ***ALASSANE K. Malick***
* SOSSOU N. Hored Yves (spokeperson)
* DASSI Carmen
* GOUDALO Jospy
* DIMON Y. Vicent
* ABALO Jean-Jaques
* FAYOMI Horace 

### Registrars ###
* ***ATTOU Eric***
* QUENUM Osée (spokeperson)
* AHOSSI Béranger
* BOKO Thomas
* DANGBE Romuald
* DJODJI Osirus
* GBEDJI Franck
* KIOSSOU Harold
* SOSSOU Jean-Baptiste
* TOSSA Narcisse


### ISP (Resolvers) ###
* ***MIGNONDJE Aimé***
* WHANDENON Ruddy (spokeperson)
* ALOHOUTADE Ronald
* ASSOGBA Eric
* ELEGBA Venance


## Management Collected Stats ##
### DNS Queries per team ###
![DNS queries per group](https://raw.githubusercontent.com/AlfredArouna/DNSathon/master/2018/01_dns_traffic_per_group.png)
### Total DNS Queries ###
![Total DNS queries](https://raw.githubusercontent.com/AlfredArouna/DNSathon/master/2018/02_dns_queries.png)
### DNS Responses ###
![DNS responses code](https://raw.githubusercontent.com/AlfredArouna/DNSathon/master/2018/03_dns_responses.png)
### DNS Responses Type ###
![DNS responses type](https://raw.githubusercontent.com/AlfredArouna/DNSathon/master/2018/04_dns_replies.png)
### DNS Cached vs Forwarded ###
![DNS Cached vs Forwarded](https://raw.githubusercontent.com/AlfredArouna/DNSathon/master/2018/05_dns_cache_forwarded.png)
### Global Network Latency ###
![Network Latency](https://raw.githubusercontent.com/AlfredArouna/DNSathon/master/2018/06_ping_latency.png)

## Support & Logistiq ##
* BDF 2018 Team (Yazid, Ramanou, Harold, etc)
* Alfred (coach)
