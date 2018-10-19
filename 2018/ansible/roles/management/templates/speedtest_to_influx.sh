#!/usr/bin/env sh

SPEEDTEST_FRQUENCY=300
EXTRA_TAGS=""
INFLUXDB_HOST= "{{ influxdb_ip_address }}" # IP or hostname to InfluxDB server
INFLUXDB_PORT= 8086 # Port on InfluxDB server
INFLUXDB_USERNAME= "root"
INFLUXDB_PASSWORD= "root"
INFLUXDB_DATABASE= "{{ influxdb_database_speedtest }}"




while [ 1 ]
do

  logger Starting new test 

  timestamp=$(date +%s%N)

  hostname=$(hostname)

  logger Current timestamp: $timestamp

  output=$(speedtest-cli --simple)

  logger Output: $output

  line=$(echo -n "$output" | awk '/Ping/ {print "ping=" $2} /Download/ {print "download=" $2 * 1000 * 1000} /Upload/ {print "upload=" $2 * 1000 * 1000}' | tr '\n' ',' | head -c -1)

  curl -XPOST "http://$INFLUXDB_HOST:$INFLUXDB_PORT/write?db=$INFLUXDB_DATABASE" -d "speedtest,host=$hostname$EXTRA_TAGS $line $timestamp"

  logger New speedtest sent

  sleep $SPEEDTEST_FRQUENCY

done  
