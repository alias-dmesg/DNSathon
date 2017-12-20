# Custom reolver (for internal purpose)

## Tools ##
We need to use ***unbound***, which is a DNS service provider.

To install it, enter the following command in sudo mode  : ***apt-get install unbound***

Then, we check the unbound start by this command : ***sudo netstat -tulpen | grep unbound***

## Configurations ##

-  Configuration of ***root.hints*** file (it will contain the domain names and their corresponding addresses)

- Changing the configuration file ***/etc/unbound/unbound.conf*** with the following settings : 

    interface: 0.0.0.0  # Ipv4 connection interface
    interface: ::0 # Ipv6 connection interface
    access control: 0.0.0.0/0 allow # define the IPv4 networks that can reach us
    access control:::0/0 allow #  define the IPv6 networks that can reach us
    root-hints : /etc/unbound/root.hints # indicates the path of the root-hints file

- Checking the configuration with the ***unbound-checkconf*** command

- Restart unbound service with command : ***unbound service restart***


