# DNSathon 2017 #

The 1st DNS Hackathon was held November 23-24, 2017 as part of Benin DNS Forum activities in Cotonou, BJ. 

In each subdirectory contains the materials submitted and archived by the participants organized by team name.

## Infrastructure ##

### Network ###
We have used two Cisco 2950 swicthes and one Mikrotik 2011 UiAs-2HnD as router. Patch cable has been used to connect all components: Raspberry-Pi, team member laptop, switches and routers. 

#### Transit ####
International connectivity has been assured by the sponsor Sud Telecom.

#### Servers #####
For each server, we assign IP based on following IP adressing plan:


| Id | Role | # | Hostname | IP | GW | Vlan | Resolvers |
| ----- | --- | ----- | --- | ---- | --- | -- | --- |
| 1 | **Root** | 1 | `pi-root` | 192.168.10.10/24 | 192.168.10.1 | 10 | 127.0.0.1 |
| 2 | **Registry** | 1 | `pi-registry-1` | 192.168.20.10/24 | 192.168.20.1 | 20 | 127.0.0.1 |
| 3 | **Registry** | 2 | `pi-registry-2` | 192.168.20.20/24 | 192.168.20.1 | 20 | 127.0.0.1 |
| 4 | **Registrar** | 1 | `pi-registrar-1` | 192.168.30.10/24 | 192.168.30.1 | 30 | 192.168.40.10 & 192.168.40.20 |
| 5 | **Registrar** | 2 | `pi-registrar-2` | 192.168.30.20/24 | 192.168.30.1 | 30 | 192.168.40.10 & 192.168.40.20 |
| 6 | **Resolver** | 1 | `pi-resolver-1` | 192.168.40.10/24 | 192.168.40.1 | 40 | 127.0.0.1 |
| 7 | **Resolver** | 2 | `pi-resolver-2` | 192.168.40.20/24 | 192.168.40.1 | 40 | 127.0.0.1 |


#### Design ####
In a nutshell, we have setup following network design
![Infrastructure Overview](https://raw.githubusercontent.com/AlfredArouna/DNSathon/master/2017/bdf_hackathon.jpg)


### Servers ###

#### Materials ####
We use Raspberry-Pi 3 Model B as servers. For each one, we use the default pre-installed OS: `Raspbian`. 

#### Services ####
With servers, we will offer DNS services, such as:
* Root
* Registries
* Registrars
* Resolvers


## Teams ##

### Communication ###
* ***KOTTIN Caroline Marie***
* AGUIAR Morel
* FOLAHAN Didier
* OUSSOUGOE Fabrice

### Root ####
* ***BASSABI Falilou***
* HOUGNI Bouraïma
* TONAMON Florent
* AHLONSOU Ruben
* HOUINSOU Joanie
* AWOU Kossi
* MADY Sara 

### Registry ###
#### Registry-1 ####
* ***DOHETO H. Frédéric G***
* AGOSSA S. Emmanuel
* KEDAGNI Elgort
* BOBO Andil
* DANGBE Romuald

#### Registry-2 ####
* ***LETCHEDE Raoul***
* AYENA Edgar
* ALASSANE Malick
* ADONON Aquilas

### Registrars ###
#### Registrar-1 ####
* ***ACHADE Charbel***
* QUENUM Osée 
* ELEGBA Venance
* BOTON Madjid 
* AHOUISSOUSSI Murielle

#### Registrar-2 ####
* ***SESSOU Géraud***
* ABOH Melvina
* DOSSOU Israel
* DOVI Hortense
* SEMASSA Luc

### ISP (Resolvers) ###
#### ISP-1 ####
* ***ADAM Fofana Taofic***
* FAYOMI Horace
* ASSOGBA Richmir
* LEADI Samad
* KAKPO Alves
* ADJIN Fructueux

#### ISP-2 ####
* ***AHOUANSOU Lieben***
* AGBAKOU Jean-Baptiste
* AHOUANSOU Lieben
* ALOHOUTADE Ronald
* HOUNKPONOU Sidoine

## Support & Logistiq ##
* Mr. Yaovi Atohoun
* Mr. Carl Aniambossou, DC & Ms. (from SudTelecom)
* Hotel KTA ?
* BDF 2017 Team (Yazid, Jeremy, Ramanou, Mathias, Muriel, Harold, etc)
* Alfred (coach)
