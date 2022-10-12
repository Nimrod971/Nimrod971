public enum Value {

	//si cest - dans l'UML c'est private
	//si c'est + dans l'UML c'est public
	//nom des instances en majuscule
	
	AS(1,"A"), TWO(2,"2"), THREE(3,"3"), FOUR(4,"4"), FIVE(5,"5"), SIX(6,"6"), SEVEN(7,"7"), EIGHT(8,"8"), NINE(9,"9"), TEN(10,"10"), JACK(11,"J"), QUEEN(12,"Q"), KING(13,"K");
		
	private String symbole;
	
	private int points;
	
	private Value(int points, String symbole)
	{
		this.points = points;
		this.symbole = symbole;
	}
	
	public String getSymbole()
	{
		return this.symbole;
	}
	
	public int getPoints()
	{
		return this.points;
	}
}
