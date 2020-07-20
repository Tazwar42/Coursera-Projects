#		python code
#		script_name: demo
#
#		author: monem tajwer
#		description: composition practice
#
#   Set up
from earsketch import *

init()
setTempo(120)
#   Music
chords = RD_UK_HOUSE__5THCHORD_2
secondaryBeat = HIPHOP_BASSSUB_001
mainBeat = HOUSE_MAIN_BEAT_003
fitMedia(chords, 1, 1, 16)
#   Add effect between measures 1 and 16 moving from 16db to 5 db and background
setEffect(1, VOLUME, GAIN, -60, 1, 5, 12)
setEffect(1, VOLUME, GAIN, 5, 12, -60, 16)
fitMedia(secondaryBeat, 2, 1, 12)
#   Add effect
setEffect(2, DELAY, DELAY_TIME, 500)
fitMedia(mainBeat, 3, 1, 8)
#   Add effect
setEffect(3, REVERB, REVERB_TIME, 200)
#   Finish
finish()
