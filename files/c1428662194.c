#include<stdio.h>
int main()
{
int n,b=0,t,a;
scanf("%d",&n);
t = n;
while(n>0)
{
a=n%10;
b = b+a*a*a;
n = n/10;
}
if(b==t )
printf("armstrong");
else
printf("not armstrong");
}