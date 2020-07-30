# 6 criteria : reliabilty , maintainibilty , efficiency , testability , portability , integrity
#5 os : McCall , ISO 9126, Boehm , FURPS , Dromey
#import pandas as pd
#! path\to\interpreter\python.exe
import sys
sys.path = sys.path[1:]
import numpy
numpy.path=numpy.path[1:]
#print(numpy.__path__)

import pandas as pd
import csv
import math

def dist_calc(a,b):
    t=(pow( (a[2]-b[2]) , 2 )) + (pow( (a[1]-b[1]) , 2 )) + (pow( (a[0]-b[0]) , 2))
    return(math.sqrt(t/3))


def find_max_a(cm,j):
    max_a=cm[0][j][0]
    for i in range (1,len(cm)):
        if cm[i][j][0] > max_a:
            max_a=cm[i][j][0]
    return max_a
def find_max_b(cm,j):
    max_b=cm[0][j][1]
    for i in range (1,len(cm)):
        if cm[i][j][1] > max_b:
            max_b=cm[i][j][1]
    return max_b
def find_max_c(cm,j):
    max_c=cm[0][j][2]
    for i in range (1,len(cm)):
        if cm[i][j][2] > max_c:
            max_c=cm[i][j][2]
            print(max_c)
            print(" ")
            print(i)
    return max_c       
def find_min_a(cm,j):
    min_a=cm[0][j][0]
    for i in range (1,len(cm)):
        if cm[i][j][0] < min_a:
            min_a=cm[i][j][0]
    return min_a 
def find_min_b(cm,j):
    min_b=cm[0][j][1]
    for i in range (1,len(cm)):
        if cm[i][j][1] < min_b:
            min_b=cm[i][j][1]
    return min_b
def find_min_c(cm,j):
    min_c=cm[0][j][2]
    for i in range (1,len(cm)):
        if cm[i][j][2] < min_c:
            min_c=cm[i][j][2]
    return min_c    




  
dm=[]
with open("cm_software.csv", 'r')as csv_file:
    csv_reader = csv.reader(csv_file, delimiter=',')
    line_count = 0
    for row in csv_reader:
        if line_count == 0:
           
            
            line_count += 1
        else:
            line_count += 1
            dm.append(row)
       

#print(dm) 
    
dm = [[dm[j][i] for j in range(len(dm))] for i in range(len(dm[0]))]  
#print(dm) 

dm.pop(0) 

def return_conversion_2(dm1):
    dm=[]
    for i in range(len(dm1)):
        if dm1[i]=='5':
            dm.append([7,9,9])
        elif dm1[i]=='4':
            dm.append([5,7,9])
        elif dm1[i]=='3':
            dm.append([3,5,7])
        elif dm1[i]=='2':
            dm.append([1,3,5])
        else:
            dm.append([1,1,3])
    return dm 

def return_conversion(dm):
    dm_send=[]
    for i in range(len(dm)):
        dm_send.append(return_conversion_2(dm[i]))
    return dm_send  

#final decision matrix or the combined decision matrix
dm=return_conversion(dm)
#print(dm)



#print(dm)








#weight_criteria_matrix
#apply ahp here
wt=[1,1,1,1,1,1] 

#normalized fuzzy decision  matrix
#max value dersired ==> benefit criteria
#min value desired ==>cost criteria here no criteria is cost criteria

#c is for benefit criteria
#
c=[]
for j in range (6):
    c.append(find_max_c(dm,j))
    #print(c[j])
print(c)    

cm=dm    

#a is for cost criteria
#a=[]
#for j in range (7):
#    a.append(find_min_a(cm,2))
#print(a)      
          
#normalised fuzzy matrix

for i in range(len(cm)):
    for j in range(6):
        for t in range(3):
            cm[i][j][t]=float((cm[i][j][t])/c[j])
            
            

print('normalised fuzzy matrix :')      
print(cm)            
            
        
#weighted normalised decision matrix
for i in range(len(cm)):
    for j in range(6):
        for t in range(3):
            cm[i][j][t]=cm[i][j][t]*wt[j]    
            
    
          
print('weighted normalised decision matrix : ')       
print(cm) 
       

        
        

#fpis and fnis
a_star=[]

for j in range (6):
    t_a=find_max_a(cm,j)
    t_b=find_max_b(cm,j)
    t_c=find_max_c(cm,j)
    a_star.append([t_a,t_b,t_c])

            
print('a star : ')        
print(a_star)

a_minus=[]

for j in range (6):
    t_a=find_min_a(cm,j)
    t_b=find_min_b(cm,j)
    t_c=find_min_c(cm,j)
    a_minus.append([t_a,t_b,t_c])

            
print('a minus : ')        
print(a_minus)

dist_from_a_star=[]

def return_dist_a_star(j):
    dist_from_a_star=[]
    for i in range(len(cm)):
        dist_from_a_star.append(dist_calc(cm[i][j],a_star[j]))
    return dist_from_a_star    
        
        
        
for j in range(5):
    dist_from_a_star.append(return_dist_a_star(j))
        
        
print('dist_from_a_star :')
print(dist_from_a_star)

dist_from_a_minus=[]

def return_dist_a_minus(j):
    dist_from_a_minus=[]
    for i in range(len(cm)):
        dist_from_a_minus.append(dist_calc(cm[i][j],a_minus[j]))
    return dist_from_a_minus    
        
        
        
for j in range(5):
    dist_from_a_minus.append(return_dist_a_minus(j))
        
        
print('dist_from_a_minus :')
print(dist_from_a_minus)


di_star=[]

for j in range(5):
    sum=0
    for i in range(len(dist_from_a_star)):
        sum=sum+dist_from_a_star[i][j]
    di_star.append(sum)

print('di_star')
print(di_star)    
 

di_minus=[]

for j in range(5):
    sum=0
    for i in range(len(dist_from_a_minus)):
        sum=sum+dist_from_a_minus[i][j]
    di_minus.append(sum)

print('di_minus')
print(di_minus) 


print(di_star)
print(di_minus)
#closeness coffecient

cc=[]

for i in range(len(di_minus)):
    cc.append(di_minus[i]/(di_minus[i]+di_star[i]))
    
print('closeness coefficient : ')
print(cc)    

#ranking the alternatives
rank_1=[]
rank=[]

for i in range(len(cc)):
    rank_1.append([cc[i],i])
print(rank_1)    
rank_1.sort(reverse=True) 
print(rank_1) 
for i in range(len(rank_1)):
    rank.append(rank_1[i][1])



print('rank')
print(rank)


name=[]
with open("cm_software.csv", 'r') as csvfile: 
    # creating a csv reader object 
    csvreader = csv.reader(csvfile) 
    # extracting each data row one by one 
    #print(csvreader[0])
    for row in csvreader:
        name.append(row)
        break
print(name)    
name2=[]
for i in range(1,6):
    name2.append(name[0][i])
    
name=name2    
print(name)

rank_name=[]
for i in rank:
    rank_name.append(name[i])  
    
print(rank_name)   


fields= ['McCall', ' ISO 9126', 'Boehm', 'FURPS', 'Dromey']
with open('rank_software.csv', 'w') as csvfile: 
    # creating a csv writer object 
    csvwriter = csv.writer(csvfile) 
    csvwriter.writerow('CC')
    for i in range(5):
        csvwriter.writerow([cc[i]])



import numpy as np
import matplotlib.pyplot as plt
 
# set width of bar
barWidth = .11
 




#importing the data set
dataset=pd.read_csv('rank_software.csv')
#1=dataset.iloc[1:1].values
#print(x1)
x1=dataset.iloc[:,0].values



plt.figure(figsize=(30,15)) 


 
# Set position of bar on X axis
r1 = np.arange(len(x1))

 
# Make the plot
plt.bar(r1, x1, color='black', width=barWidth, edgecolor='black')

 
 
 

# Add xticks on the middle of the group bars
plt.xlabel('OS', fontweight='bold')
plt.ylabel('Closeness Coefficient', fontweight='bold')


plt.xticks([ r1+barWidth for r1 in range(len(x1)) ], fields)
plt.xticks(rotation=85) 

plt.savefig('OS.png',dpi=100,bbox_inches='tight')
plt.show()   