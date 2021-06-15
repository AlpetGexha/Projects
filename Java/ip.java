package Challage1;
import java.net.InetAddress;
public class ip {
	public static  void main(String args[])  throws Exception{
		InetAddress  myIP = InetAddress.getLocalHost();
		System.out.print("IP-ja është: ");
		System.out.println(myIP.getHostAddress());
	}
}
