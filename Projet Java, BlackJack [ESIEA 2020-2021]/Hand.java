import java.util.LinkedList;
import java.util.Collections;
import java.util.List;

public class Hand {
	
	Card card;
	private LinkedList<Card> cardList = new LinkedList<Card>();
	
	public Hand(){
	}
	
	public String toString(){
		return cardList.toString()+" : "+count().toString(); //+". \nThe best score is "+best();
	}
	
	public void add(Card card){
		cardList.add(card);
	}
	
	public void clear(){
		cardList.clear();
	}
	
	public LinkedList<Integer> count(){
		  
		LinkedList<Integer> list = new LinkedList<Integer>();

	  	int val=0, tmp=0,taille = 1;
	  	list.add(0);
	    	//Card[] tab;
	    	for(int i=0;i<cardList.size();i++){
	      	tmp=cardList.get(i).getPoints();

	      	for(int j=0;j<taille;j++){
			val=list.get(j);
			list.set(j,val+tmp);
			if(tmp==1){
		    		list.add(val+11);
		    	}
		}

		if(tmp==1) taille+=1;

	   	}
	    	return list;	
	}
	
	public int best(){
	
	  	int max=0;
		LinkedList<Integer> list = new LinkedList<Integer>();
		list= count();
		for(int i=0;i<list.size();i++){
		    if (list.get(i)>=max && list.get(i)<=21){
		      max = list.get(i);
		    }
		}
		if (max == 0) return list.get(0);
		return max;

	}
	
	public List<Card> getCardList(){
    		return cardList;
	}
}
