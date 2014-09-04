#get payload and get media url from it
url=`cat task_payload.json | jq -r '.media_input'`

input="input.mp4"
output="output.mp4"
curr_dir=`pwd`
echo "Downloading $url ..."
wget $url -O $input

echo "Repairing $input file to $output $file ..."
ffmpeg -i $input -c:v copy -c:a copy -movflags faststart $output
MP4Box -par 1=1:1 $output -tmp $curr_dir