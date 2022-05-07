#!/bin/bash
function version() {
    echo "$shellscriptname $VERSION (cli) (built: $VERSION_UPDATED)"
}

function usage() {
    echo "Usage: $shellscriptname <command>"
    echo 
    echo "commands:"
    echo "  filename"
    echo "  -h, --help"
    echo "  -v, --version"
}

function get_extension() {
    echo ${1##*.}
}

function dsugiyama()
{   
    mocha Views/test/website/dsugiyama.js --timeout=100000
}

function seodoa()
{   
    mocha Views/test/website/seodoa.js --timeout=100000
}

function sofia()
{   
    mocha Views/test/website/sofia.js --timeout=100000
}

function compile() {
    
    if [ ! -e ${VIEW_DIR}/$1 ]
        then
        echo "Error: $1 not found."
        exit
    fi
    file="$1"
    if [ ! -z $2 ]
        then
        option="$2"
    fi
    if [ $(get_extension $file) = "scss" ]
        then
        sass ${VIEW_DIR}/${file}:${CSS_DIR}/${file%.*}.min.css --no-source-map --style compressed ${option}
    elif [ $(get_extension $file) = "js" ]
        then
        mkdir -p $(dirname ${JS_DIR}/${file})
        uglifyjs ${VIEW_DIR}/${file} -c --output ${JS_DIR}/${file%.*}.min.js ${option}
    else
        echo "Error: $(get_extension $file), this extension is unsupported."
    fi
}

function serverinfo() {
    CPU=`cat /proc/cpuinfo | grep name | cut -d: -f2 | tail -1`
    echo "CPU info."
    echo "CPU : $CPU"
    MEM=`cat /proc/meminfo | grep MemTotal | awk '{print$2/1000"MB"}'`
    SWAP=`cat /proc/meminfo | grep SwapTotal | awk '{print$2/1000"MB"}'`
    echo "Memory info."
    echo "  Memory Total : $MEM"
    echo "  SWAP Total : $SWAP"
    TEMP=`ls /etc -F | grep "release$¥|version$"`
    DIST=`cat /etc/$TEMP`
    echo "Distribution info."
    echo "  Version : $DIST"
    HOST=`hostname`
    IP=`ifconfig | grep 'inet addr' | grep -v 127.0.0.1 | awk '{print$2;}' | cut -d: -f2`
    SM=`ifconfig | grep 'inet addr' | grep -v 127.0.0.1 | awk '{print$4;}' | cut -d: -f2`
    GW=`netstat -r | grep default | awk '{print$2}'`
    echo "Network info."
    echo "  Hostname : $HOST"      
    echo "  IPAdress/SubnetMask : $IP/$SM"      
    echo "  DefaultGW : $GW"
}