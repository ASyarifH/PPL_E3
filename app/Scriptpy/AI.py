import pandas as pd
from sklearn.ensemble import RandomForestClassifier
import sys

# Data yang disesuaikan dengan pertumbuhan padi dan jagung
data = {
    'Suhu': [22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33],
    'Curah Hujan': ['Cerah', 'Cerah Berawan', 'Berawan', 'Hujan Ringan', 'Hujan Sedang', 'Hujan Lebat',
                    'Cerah', 'Cerah Berawan', 'Berawan', 'Hujan Ringan', 'Hujan Sedang', 'Hujan Lebat'],
    'Tanah_pH': [5.5, 5.6, 5.7, 5.8, 5.9, 6.0, 6.1, 6.2, 6.3, 6.4, 6.5, 6.6],
    'Tanaman Cocok': ['Padi', 'Jagung', 'Jagung', 'Padi', 'Jagung', 'Padi',
                      'Padi', 'Jagung', 'Jagung', 'Padi', 'Jagung', 'Padi']
}

df = pd.DataFrame(data)

# Pisahkan fitur dan label
X = df.drop('Tanaman Cocok', axis=1)
y = df['Tanaman Cocok']

# Latih model Random Forest
model = RandomForestClassifier(random_state=42)
model.fit(X, y)

# Fungsi untuk prediksi tanaman cocok berdasarkan input
def predict_crop(suhu, curah_hujan, Tanah_pH):
    # Mengonversi input pengguna ke dalam dataframe
    user_input_df = pd.DataFrame([[suhu, curah_hujan, Tanah_pH]], columns=['Suhu', 'Curah Hujan', 'Tanah_pH'])
    
    # Prediksi tanaman yang cocok
    prediction = model.predict(user_input_df)

    return prediction[0]

# Meminta input dari command-line arguments
suhu_input = int(sys.argv[1])
curah_hujan_input = sys.argv[2]
ph_input = float(sys.argv[3])

# Panggil fungsi predict_crop dengan input dari command-line arguments
hasil_prediksi = predict_crop(suhu_input, curah_hujan_input, ph_input)
print(hasil_prediksi)  # Mengirim hasil prediksi ke console (output)
