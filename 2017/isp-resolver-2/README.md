# Custom reolver

## Tools ##
Since we are an ISP, we need validating and caching resolver. For this purpose, we will use a lightweight caching and resolver DNS server: `unbound`.


To install it, enter the following command with administrative privilege  : `apt-get install unbound`

Then, we check that unbound have started by using this command : `sudo netstat -tulpen | grep unbound`

## Configurations ##

### Getting  ***root.hints*** file ###

The ***root.hints*** will be provided by the root team. Basicaly, this file will contain only one record: the `.` with his NS servers (managed by the root team).

### Configuration of Unbound###

We backup current configuration and create a clean new one with following configuration in `/etc/unbound/unbound.conf`: 

```
    interface: 0.0.0.0  # Ipv4 connection interface
    interface: ::0 # Ipv6 connection interface
    access control: 0.0.0.0/0 allow # define the IPv4 networks that can reach us
    access control:::0/0 allow #  define the IPv6 networks that can reach us
    root-hints : /etc/unbound/root.hints # indicates the path of the root-hints file
```

We can then checking the configuration with the `unbound-checkconf` command. If everything is correct, we can restart unbound service with command `unbound service restart`.


