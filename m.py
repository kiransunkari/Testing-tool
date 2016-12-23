# file : m.py
import os
import sys

def DeleteTempFiles(path,uniq):
    #del 
    os.system('del '+path+'\\files\\a.exe')
    # Construct output and input filepaths
    i = 0
    while i<3:
        os.system('del '+path + '\\Output\\' + uniq + '_'+ ques +'_output' + repr(i) + '.txt')
        os.system('del '+path + '\\Output\\' + uniq + '_'+ 'run_'+uniq+'.c' +'_output' + repr(i) + '.txt')
        os.system('del '+path + '\\Input\\input_' + uniq + repr(i) + '.txt')
        i+=1


def RunProgram(command,prog,uniq):
    path = command
    command = command+'\\files'
    command = 'cd '+ '"' + command + '"'
    command1 = 'gcc '+ prog +'>compileoutput.txt'
    command = command +'&&'+ command1
    c = os.system(command)
    if c == 1:
        return 0
    testcases = os.listdir(path +'\\Input')
    index=0
    for each in testcases:
        inputFile = path + '\\Input\\' + each
        outputFile = path + '\\Output\\' + uniq +'_'+ prog +'_output' + str(index) + '.txt'
        a = open(inputFile,"r")
        b = open(outputFile,"w")
        executecommand = '(files\\a.exe < Input\\' + each + ') > tempOutput.txt'
        os.system(executecommand)
        k  = open('tempOutput.txt',"r")
        output = k.read()
        b.write(output)
        #del 'tempOutput.txt'
        index+=1
    return 1
        
        
        
    
    
def CompareResults(path,uniq,ques):
    true =0
    false =0
    for index in range(0,3):
        mainoutput =  path + '\\Output\\' + uniq + '_'+ ques +'_output' + str(index) + '.txt'
        mainoutput1 =  path + '\\Output\\' + uniq + '_'+ 'run_'+uniq+'.c' +'_output' + str(index) + '.txt'
        k = open(mainoutput,"r")
        s = open(mainoutput1,"r")
        m = k.read()
        l = s.read();
        if m==l:
            true = true+1
        else:
            false = false+1
    return true
    
        
     
# Code Starts Here
path = 'C:\\wamp\\www\\check'
# Capture Filename and Question from CLI
uniq = sys.argv[1]
ques = sys.argv[2]
# Run Question File and Generate Outputs
a1 = RunProgram(path,ques,uniq)
# Run Answer File and Generate Outputs
a2 = RunProgram(path,'run_'+uniq+'.c',uniq)
msg = []
if a1 == 0:
    msg.append('Error in Question File : Ask Faculty to Review')
elif a2 == 0:
    msg.append('Check Your Code For Syntax/Runtime Errors')
else:
    out = CompareResults(path,uniq,ques) # Comparing Them
    msg.append(repr(out)+' of 3 Tests Passed.')
DeleteTempFiles(path,uniq)
print(msg[0])





   
    
     
        
    
    
    
