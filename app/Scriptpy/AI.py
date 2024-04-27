import os
import pandas as pd
from sklearn.ensemble import RandomForestClassifier
from sklearn.preprocessing import LabelEncoder
import sys

# Dapatkan path ke skrip Python
script_dir = os.path.dirname(os.path.abspath(__file__))
# Buat path lengkap ke file "Data Prediksi Tanam.xlsx"
data_file_path = os.path.join(script_dir, 'Data Prediksi Tanam.xlsx')

# Baca data dari file Excel
data = pd.read_excel(data_file_path)

# Pemrosesan Data
label_encoder = LabelEncoder()
data['Curah Hujan'] = label_encoder.fit_transform(data['Curah Hujan'])

# Melakukan one-hot encoding untuk kolom Curah Hujan
data = pd.get_dummies(data, columns=['Curah Hujan'])

# Memisahkan fitur dan label
X = data[['Suhu', 'pH'] + [col for col in data.columns if col.startswith('Curah Hujan_')]]
y = data['Tanaman Cocok']

# Pilih Model
model = RandomForestClassifier()

# Latih Model
model.fit(X, y)

def predict_crop(suhu, curah_hujan, pH):
    if curah_hujan in label_encoder.classes_:
        # lakukan label encoding
        encoded_curah_hujan = label_encoder.transform([curah_hujan])[0]
        # Melakukan prediksi
        prediction = model.predict([[suhu, pH] + [1 if col == f'Curah Hujan_{encoded_curah_hujan}' else 0 for col in X.columns[2:]]])
        return prediction[0]  # Mengambil nilai pertama dari hasil prediksi
    elif curah_hujan == 'hujan petir':
        # Jika pengguna memilih "Hujan Petir", kembalikan pesan "Tidak dapat diprediksi"
        return "Tidak dapat diprediksi"
    else:
        # Jika tidak, kembalikan nilai None sebagai tanda bahwa nilai tersebut tidak valid
        return None

# Ambil argumen dari command line
suhu = float(sys.argv[1])
curah_hujan = sys.argv[2]
pH = float(sys.argv[3])

# # Cetak nilai input
# print("Nilai Input: suhu =", suhu, "curah_hujan =", curah_hujan, "pH =", pH)

# Panggil fungsi predict_crop dengan argumen dari command line
hasil_prediksi = predict_crop(suhu, curah_hujan, pH)

# Cetak hasil prediksi untuk memeriksa apakah nilai telah dihasilkan dengan benar
print("Hasil Prediksi:", hasil_prediksi)
