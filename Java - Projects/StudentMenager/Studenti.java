package StudentMenager;

class Studenti {
	private String _emri;
	private String _mbiemri;
	private String _emriPrindit;
	private String _email; // String Email = "^[\\w-_\\.+]*[\\w-_\\.]\\@([\\w]+\\.)+[\\w]+[\\w]$";
	private String _numriTel; // String Number = "(0/91)?[7-9][0-9]{8}";
	private String _drejtimi;
	private float _notaMesatare;
	// private static int _generateID = 1000;
	private int _id;

	protected void setId(int value) {
//		_generateID++;
//		this._id = _generateID;
		this._id = value;
	}

	protected int getId() {
		return this._id;
	}

	protected void setEmri(String value) {
		this._emri = value;
	}

	protected String getEmri() {
		return this._emri;
	}

	protected void setMbiemri(String value) {
		this._mbiemri = value;
	}

	protected String getMbiemri() {
		return this._mbiemri;
	}

	protected String getEmriPrindit() {
		return this._emriPrindit;
	}

	protected void setEmriPrindit(String value) {
		this._emriPrindit = value;
	}

	protected void setDrejtimi(String value) {
		this._drejtimi = value;
	}

	protected String getDrejtimi() {
		return this._drejtimi;
	}

	protected String getEmail() {
		return this._email;
	}

	protected void setEmail(String value) {
		this._email = value;
	}

	protected String getNumber() {
		return this._numriTel;
	}

	protected void setNumber(String value) {
		this._numriTel = value;
	}

	protected void setNotaMesatare(float value) {
		this._notaMesatare = value;
	}

	protected double getNotaMesatare() {
		return this._notaMesatare;
	}

}
