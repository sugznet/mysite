#!/bin/bash
. task/inc/config.sh

shellscriptname=$(basename $0)

if [ $# = 0 ]
    then
    usage
    exit 1
fi    
for opt in "$@"
    do
    case "$opt" in
        '-v'|'-V'|'--version')  
            version
            exit 0
            ;;
        '-h'|'-H'|'--help')  
            usage
            exit 0
            ;;
        'dsugiyama')  
            dsugiyama
            exit 0
            ;;        
        'seodoa')  
            seodoa
            exit 0
            ;;
        'sofia')  
            sofia
            exit 0
            ;;         
        *)
            echo "正しいオプションを指定してください" 1>&2
            exit 0
            ;;
    esac
done

if [ DEBUG_MODE = 1 ]
    then
    serverinfo
fi