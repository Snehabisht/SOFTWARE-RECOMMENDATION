# -*- coding: utf-8 -*-
"""
Created on Sat May  9 19:07:29 2020

@author: ANUSHKA
"""
import math
import csv
import numpy as np

def return_conversion(dm1):
    dm=[]
    for i in range(len(dm1)):
        if dm1[i]=='5':
            dm.append([4,5,6])
        elif dm1[i]=='4':
            dm.append([3,4,5])
        elif dm1[i]=='3':
            dm.append([2,3,4])
        elif dm1[i]=='2':
            dm.append([1,2,3])
        else:
            dm.append([1,1,1])
    return dm    
    
with open("sample.csv", 'r') as csvfile: 
        # creating a csv reader object 
        csvreader = csv.reader(csvfile) 
        dm=[]
        # extracting each data row one by one 
        for row in csvreader: 
            dm.append(row) 

dm=np.array(dm)
data=dm[1:,1:]
data=np.array(data)

data1=[]

for i in range(len(data)):
    data1.append(return_conversion(data[i]))
    
for a in range(len(data1)):
    for b in range(len(data1)):
        if a > b:
            data1[a][b][0] = 1./data1[b][a][2]
            data1[a][b][1] = 1./data1[b][a][1]
            data1[a][b][2] = 1./data1[b][a][0]
        if a==b:
            data1[a][b]=[1,1,1]    

r=[]
temp1=temp2=temp3=1
temp1=data1[0][0][0]*data1[0][1][0]*data1[0][2][0]*data1[0][3][0]*data1[0][4][0]*data1[0][5][0]
temp2=data1[0][0][1]*data1[0][1][1]*data1[0][2][1]*data1[0][3][1]*data1[0][4][1]*data1[0][5][1]
temp3=data1[0][0][2]*data1[0][1][2]*data1[0][2][2]*data1[0][3][2]*data1[0][4][2]*data1[0][5][2]
temp=[]
temp.append(temp1)
temp.append(temp2)
temp.append(temp3)
temp1=temp2=temp3=1

for a in range(len(data1)):
    r.append(temp)
    temp1=temp2=temp3=1    
    for b in range(len(data1)):
        if a==5:
            break
        temp1=temp1*data1[a+1][b][0]
        temp2=temp2*data1[a+1][b][1]
        temp3=temp3*data1[a+1][b][2]   
        if b==5:
            temp=[]
            temp.append(temp1)
            temp.append(temp2)
            temp.append(temp3)

r1=[]
temp1=temp2=temp3=1
temp1=data1[0][0][0]*data1[0][1][0]*data1[0][2][0]*data1[0][3][0]*data1[0][4][0]*data1[0][5][0]
temp2=data1[0][0][1]*data1[0][1][1]*data1[0][2][1]*data1[0][3][1]*data1[0][4][1]*data1[0][5][1]
temp3=data1[0][0][2]*data1[0][1][2]*data1[0][2][2]*data1[0][3][2]*data1[0][4][2]*data1[0][5][2]
temp=[]
temp1=pow(temp1,(1/len(data1)))
temp2=pow(temp2,(1/len(data1)))
temp3=pow(temp3,(1/len(data1)))
temp.append(temp1)
temp.append(temp2)
temp.append(temp3)
temp1=temp2=temp3=1

for a in range(len(data1)):
    r1.append(temp)
    temp1=temp2=temp3=1    
    for b in range(len(data1)):
        if a==5:
            break
        temp1=temp1*data1[a+1][b][0]
        temp2=temp2*data1[a+1][b][1]
        temp3=temp3*data1[a+1][b][2]   
        if b==5:
            temp1=pow(temp1,(1/len(data1)))
            temp2=pow(temp2,(1/len(data1)))
            temp3=pow(temp3,(1/len(data1)))
            temp=[]
            temp.append(temp1)
            temp.append(temp2)
            temp.append(temp3)

rt=[0,0,0]
for a in range (len(r1)):
    for b in range (3):
        rt[b]+=r1[a][b]
    
rt_inverse=[(1/rt[2]),(1/rt[1]),(1/rt[0])]

w=[]
w.append([0,0,0])
w.append([0,0,0])
w.append([0,0,0])
w.append([0,0,0])
w.append([0,0,0])
w.append([0,0,0])
for a in range (len(data1)):
    for b in range (3):
        w[a][b]=r1[a][b]*rt_inverse[b]

#defuzzified weights
#df=((l+m+u)/3)
df=[]

for a in range (len(w)):
    sum=0
    for b in range (3):
        sum+=w[a][b]
        if b==2:
            sum/=3
            df.append(sum)
        
##normalized weights
#add all the dfs and then divide each df by the sum of dfs    
nw=[]
sum_df=0
for i in range (len(df)):
    sum_df+=df[i]

for i in range (len(df)):
    nw.append(df[i]/sum_df)

sum_nw=0
for i in range (len(nw)):
    sum_nw+=nw[i]

#wtr = csv.writer(open ('fuzzified_weights.csv', 'w'), delimiter=',', lineterminator='\n')
#for x in nw : wtr.writerow ([x])

with open('fuzzified_weight.csv', 'w', newline='') as file:
    writer = csv.writer(file)
    for x in nw : writer.writerow ([x])