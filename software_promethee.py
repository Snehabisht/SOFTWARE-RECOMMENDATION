import pandas as pd
from numpy import array
import numpy as np
import csv


#importing the data set
dataset=pd.read_csv('software_model_promethee.csv')
X=dataset.iloc[:,0].values
cm=dataset.iloc[:,1:7].values
z=pd.DataFrame(cm)
    
    
def find_max(cm,j):
    i=0
    max1=cm[i][j]
    for i in range (5):
        if cm[i][j] > max1:
            max1=cm[i][j]
    return max1
    
def find_min(cm,j):
    i=0
    min1=cm[i][j]
    for i in range (1,len(cm)):
        if cm[i][j] < min1:
            min1=cm[i][j]
    return min1
    
    
# Define a vector
a=find_max(cm,0)
b=find_max(cm,1)
c=find_max(cm,2)
d=find_max(cm,3)
e=find_max(cm,4)
f=find_max(cm,5)
   
    
v1 =[a,b,c,d,e,f]
    
    
x=find_min(cm,0)
y=find_min(cm,1)
z=find_min(cm,2)
w=find_min(cm,3)
t=find_min(cm,4)
u=find_min(cm,5)
    
    
    
v2 =[x,y,z,w,t,u]
    
a1=[[0 for i in range(6)] for j in range(5)]
    
viva = [1,1,1,1,1,1]
#normalise the evaluation matrix
for j in range(6):
    for i in range(5):
        if(viva[j]==1):
            a1[i][j]=(cm[i][j]-v2[j])/(v1[j]-v2[j])
        else:
           a1[i][j]=(v1[j]-cm[i][j])/(v1[j]-v2[j])
               
                         
                         
                         
##calculate evaluative difference
    
out = []
    
for i in range(len(a1)):
    for j in range(len(a1)):
        if (i != j):
            out.append([
                a1[i][0] - a1[j][0],
                a1[i][1] - a1[j][1],
                a1[i][2] - a1[j][2],
                a1[i][3] - a1[j][3],
                a1[i][4] - a1[j][4],
                a1[i][5] - a1[j][5]
                ])
    
             
    
#calculate preference function
p=[[0 for i in range(6)] for j in range(20)]
    
    
for j in range(6):
    for i in range(20):
        if(out[i][j]>0):
            p[i][j]=out[i][j]
        else:
            p[i][j]=0
                
                
                
#criteria_wt=wt
    
    
sum1=np.sum(viva)
w=[]
w=viva
    
w1=[[0 for k in range(6)] for k in range(20)]
    
for j in range(6):
    for i in range(20):
        w1[i][j]=(w[j]*p[i][j])
    
    
    
w2=[]
w2=np.sum(w1, axis = 1)        
w3=w2/sum1
    
                
#aggregated preference matrix
    
temp=0
mat=[]
data=[]
for i in range(0,20):
    mat.append(w3[i])
    temp+=1
    if(((temp)%4)==0):
        data.append(mat)
        mat=[]
        temp=0
        
     
m=[]
for i in range (0,5):
    m.append(data[i])  
    
    
    
#create matrix
re=[[0 for i in range(5)] for j in range(5)]
for j in range(5):
    for i in range(5):
        if(i==j):
          re[i][j]=0
        elif(i>j):
          re[i][j]=m[i][j]
        else:
          re[i][j]=m[i][j-1]
                
#print(re)
    
#leaving flow and entering flow
#leaving flow
lf=np.sum(re,axis = 1)
lf1=lf/4  
#print(lf1)
    
#entering flow
ef=np.sum(re,axis = 0)
ef1=ef/4
#print(ef1)
    
lfvector = array([lf1]) 
#print(lfvector) 
    
efvector = array([ef1]) 
#print(efvector)           
                
diffvector=lfvector-efvector
arr=[]
arr=diffvector 

a=[0]*5
i=0
for j in range(5):
    a[j]=arr[i][j]
    
mini=5;
for i in range(5):
    mini=min(a[i],mini)
    
for i in range(5):
    a[i]+=mini+1;
    
n=5
#array = numpy.array([diffvector])
order = arr.argsort()
ranks = order.argsort().argsort().argsort()
#print(n-ranks)
#ranks.sort(reverse=True)
 
print("############################################################################################################################################################################################################################################################")     
print("############################################################################################################################################################################################################################################################")         
print("\nPROMETHEE ANALYSIS\n")
print("Ranking Of Software Quality Models : \n")
correct=n-ranks
    
    
    
i=0
for j in range(5):
    print( correct[i][j] ,"Rank ->",X[j])
    
    
 
print("############################################################################################################################################################################################################################################################")   
  
print("\nOverall Ranking of Software Quality Models : \n")       
 
with open('cri1.csv', 'w') as csvfile: 
# creating a csv writer object 
     csvwriter = csv.writer(csvfile) 
     csvwriter.writerow('CC')
     for i in range(5):
         csvwriter.writerow([a[i]])
         
import matplotlib.pyplot as plt
     
# set width of bar
barWidth = .30

#importing the data set
dataset=pd.read_csv('cri1.csv')
x1=dataset.iloc[:,0].values
# Set position of bar on X axis
r1 = np.arange(len(x1))
    
     
# Make the plot
fields=['McCall','ISO 9126','Boehm','FURPS','Dromey']   
plt.bar(r1, x1, color='blue', width=barWidth, edgecolor='black')
plt.xlabel('Software Model', fontweight='bold')
plt.xticks([ r1+barWidth for r1 in range(len(x1)) ], fields)
plt.xticks(rotation=85) 
 
plt.show()
    